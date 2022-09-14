<?php

namespace App\Services\Payment;

use App\Payment;
use Illuminate\Support\Facades\DB;

/**
 * Class PaymentService.
 */
class PaymentService
{
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
}
