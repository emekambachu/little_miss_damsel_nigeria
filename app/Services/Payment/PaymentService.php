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
        // Create empty array for search values session
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

        $allPayments = $this->paymentWithRelations()
                ->select(
            'payments.*',
                    'contestants.id AS contestants_id',
                    'contestants.name AS contestants_name'
                )->leftjoin(
                    'contestants',
                     'contestants.id', '=', 'payments.contestant_id'
                )->where(function($query) use ($input){
            $query->when(!empty($input['term']), static function($q) use($input){
                $q->where('payments.email', 'like' , '%'. $input['term'] .'%')
                    ->orWhere('payments.name', 'like' , '%'. $input['term'] .'%')
                    ->orWhere('payments.bank', 'like' , '%'. $input['term'] .'%')
                    ->orWhere('payments.status', 'like' , '%'. $input['term'] .'%')
                    ->orWhere('payments.payment_method', 'like' , '%'. $input['term'] .'%')
                    ->orWhere('contestants.name', 'like' , '%'. $input['term'] .'%');
            });

        })->when(!empty($input['payment_method']), static function ($q) use($input){
            return $q->where('payments.payment_method', $input['payment_method']);
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
            $payment = $this->payment()->create([
                'contestant_id' => $paymentDetails['data']['metadata']['contestant_id'],
                'name' => $paymentDetails['data']['metadata']['name'],
                'email' => $paymentDetails['data']['customer']['email'],
                'amount' => $paymentDetails['data']['metadata']['amount'],
                'quantity' => $paymentDetails['data']['metadata']['quantity'],
                'payment_method' => $paymentDetails['data']['metadata']['payment_method'],
                'status' => 'confirmed',
            ]);

            // Update Contestant Votes
            $this->updateContestantVotes($payment);
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

        // update contestant votes
        $this->updateContestantVotes($payment);

        return [
            'payment' => $payment,
            'message' => $message,
        ];
    }

    public function updateContestantVotes($payment): void
    {
        $contestant = $this->contestant->contestantById($payment->contestant_id);
        if($payment->status === 'confirmed'){
            $contestant->votes += $payment->quantity;
        }else{
            $contestant->votes -= $payment->quantity;
        }
        $contestant->save();
    }


}
