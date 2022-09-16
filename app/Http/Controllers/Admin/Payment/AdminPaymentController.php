<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use App\Services\Payment\PaymentService;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    private $payment;
    public function __construct(PaymentService $payment){
        $this->middleware('auth:web');
        $this->payment = $payment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $payments = $this->payment->paymentWithRelations()
                ->latest()->paginate(15);
            $sum = $this->payment->paymentWithRelations()->sum('amount');
            return response()->json([
                'success' => true,
                'payments' => $payments,
                'total' => $payments->total(),
                'sum' => $sum,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $payments = $this->payment->searchPayments($request);
            return response()->json([
                'success' => true,
                'payments' => $payments['payments'],
                'total' => $payments['total'],
                'sum' => $payments['sum'],
                'search_values' => $payments['search_values'],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function destroy($id){

    }


}
