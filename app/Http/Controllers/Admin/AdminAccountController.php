<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contestant\ContestantService;
use App\Services\Payment\PaymentService;
use Illuminate\Http\Request;

class AdminAccountController extends Controller
{
    private $contestant;
    private $payment;
    public function __construct(ContestantService $contestant, PaymentService $payment){
        $this->middleware('auth:web');
        $this->contestant = $contestant;
        $this->payment = $payment;
    }

    public function stats(): \Illuminate\Http\JsonResponse
    {
        try {
            $totalContestants = $this->contestant->contestant()->count();
            $totalPayers = $this->payment->totalPayers();
            $sumCompletedPayments = $this->payment->sumCompletedPayments();
            return response()->json([
                'success' => true,
                'total_contestants' => $totalContestants,
                'total_payers' => $totalPayers,
                'sum_completed_payments' => $sumCompletedPayments,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

}
