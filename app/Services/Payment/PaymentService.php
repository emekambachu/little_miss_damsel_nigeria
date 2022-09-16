<?php

namespace App\Services\Payment;

use App\Contestant;
use App\Payment;
use App\Services\Contestant\ContestantService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

/**
 * Class PaymentService.
 */
class PaymentService
{
    protected $contestant;
    public function __construct(ContestantService $contestant){
        $this->contestant = $contestant;
    }

    public function payment(): Payment
    {
        return new Payment();
    }

    public function paymentWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->payment()->with('contestant');
    }

    public function paymentById($id)
    {
        return $this->paymentWithRelations()->findOrFail($id);
    }

    public function totalPayers(){
        return $this->payment()
            ->select('email', DB::raw('count(*) as total'))
            ->groupBy('email')
            ->get()->count();
    }

    public function sumCompletedPayments(){
        return $this->paymentWithRelations()
            ->has('contestant')
            ->where('status', 'confirmed')
            ->sum('amount');
    }

    public function searchPayments($request): array
    {
        $input = $request->all();
        $request->session()->forget(['search_inputs']);

        // Create empty array for search values session
        // Add all input to search inputs session, can be easily passed to export functionality
        $request->session()->put('search_inputs', $input);
        $searchValues = [];

        if(!empty($input['term'])) {
            $searchValues['term'] = $input['term'];
        }

        if(!empty($input['payment_method'])) {
            $searchValues['payment_method'] = $input['payment_method'];
        }

//        if(!empty($input['payment_status'])) {
//            $searchValues['payment_status'] = $input['payment_status'];
//        }

        $allPayments = $this->paymentWithRelations()->where(function($query) use ($input){
            $query->when(!empty($input['term']), static function($q) use($input){
                $q->where('email', 'like' , '%'. $input['term'] .'%')
                    ->where('name', 'like' , '%'. $input['term'] .'%')
                    ->where('bank', 'like' , '%'. $input['term'] .'%')
                    ->where('status', 'like' , '%'. $input['term'] .'%')
                    ->where('payment_method', 'like' , '%'. $input['term'] .'%');
            });

        })->when(!empty($input['payment_method']), static function ($q) use($input){
            return $q->where('payment_method', $input['payment_method']);
        });

        $payments = $allPayments->paginate(15);
        $sum = $allPayments->sum('amount');

        // if result exists return results, else return empty array
        if($payments->total() > 0){
            return [
                'payments' => $payments,
                'total' => $payments->total(),
                'sum' => $sum,
                'search_values' => $searchValues
            ];
        }

        return [
            'payments' => [],
            'total' => 0,
            'sum' => 0,
            'search_values' => $searchValues
        ];
    }

    public function storeCardUserDetails($request): void
    {
        $input = $request->all();
        Session::put('contestant_id', $input['contestant_id']);
        Session::put('name', $input['name']);
        Session::put('email', $input['email']);
        Session::put('quantity', $input['quantity']);
        Session::put('amount', $input['quantity'] * 50);
        Session::put('payment_method', $input['payment_method']);
    }

    public function storeCardPayment($paymentDetails): void
    {
        if($paymentDetails['data']['status'] === 'success'){
            // Store payment
            $payment_successful = $this->payment()->create([
                'contestant_id' => $paymentDetails['data']['metadata']['contestant_id'],
                'name' => $paymentDetails['data']['metadata']['name'],
                'email' => $paymentDetails['data']['customer']['email'],
                'amount' => $paymentDetails['data']['metadata']['amount'],
                'quantity' => $paymentDetails['data']['metadata']['quantity'],
                'payment_method' => $paymentDetails['data']['metadata']['payment_method'],
                'status' => 'confirmed',
            ]);

            Session::flush();
        }
    }

    public function storeBankPayment($request)
    {
        $input = $request->all();
        $input['amount'] = $input['quantity'] * 50;
        return $this->payment()->create($input);
    }

    public function confirmBankPayment($id): array
    {
        $payment = $this->paymentById($id);
        if($payment->status === 'confirmed'){
            $payment->status = 'pending';
            $message = 'Payment Suspended';
        }else{
            $payment->status = 'confirmed';
            $message = 'Payment Approved';
        }
        $payment->save();
        return [
            'payment' => $payment,
            'message' => $message,
        ];
    }

    public function storeVotes($payment): void
    {
        $this->contestant->vote()->create([
           'payment_id' => $payment->id,
           'contestant_id' => $payment->contestant_id,
           'amount' => $payment->amount,
           'quantity' => $payment->quantity,
        ]);
    }


}
