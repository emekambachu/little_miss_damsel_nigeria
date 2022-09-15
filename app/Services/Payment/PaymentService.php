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
            ->get();
    }

    public function sumCompletedPayments(){
        return $this->payment()->where('status', 'completed')->sum('amount');
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

        $payments = $this->paymentWithRelations()->where(function($query) use ($input){
            $query->when(!empty($input['term']), static function($q) use($input){
                $q->where('email', 'like' , '%'. $input['term'] .'%')
                    ->where('accname', 'like' , '%'. $input['term'] .'%')
                    ->where('accnum', 'like' , '%'. $input['term'] .'%')
                    ->where('bank', 'like' , '%'. $input['term'] .'%')
                    ->where('payment_method', 'like' , '%'. $input['term'] .'%');
            });

        })->when(!empty($input['payment_method']), static function ($q) use($input){
            return $q->where('payment_method', $input['payment_method']);
        });

        $payments = $payments->paginate(15);
        $sum = $payments->sum('amount');

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
                'status' => 1,
            ]);

            // Store votes
            if($payment_successful){
                $this->storeVotes($payment_successful);
                Session::flush();
            }
        }
    }

    public function storeVotes($payment_successful): void
    {
        $this->contestant->vote()->create([
           'payment_id' => $payment_successful->id,
           'contestant_id' => $payment_successful->contestant_id,
           'amount' => $payment_successful->amount,
           'quantity' => $payment_successful->quantity,
        ]);
    }

    public function storeBankPayment($request){

    }
}