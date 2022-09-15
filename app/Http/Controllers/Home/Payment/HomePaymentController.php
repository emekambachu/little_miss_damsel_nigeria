<?php

namespace App\Http\Controllers\Home\Payment;

use App\Contestant;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Home\Payment\PaymentVoteBankRequest;
use App\Http\Requests\Home\Payment\PaymentVoteOnlineRequest;
use App\Payment;
use App\Services\Contestant\ContestantService;
use App\Services\Payment\PaymentService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Unicodeveloper\Paystack\Facades\Paystack;


class HomePaymentController extends Controller
{
    protected $payment;
    protected $contestant;
    public function __construct(PaymentService $payment, ContestantService $contestant){
        $this->payment = $payment;
        $this->contestant = $contestant;
    }

    public function payOnline(PaymentVoteOnlineRequest $request): \Illuminate\Http\JsonResponse
    {
        try{
            $this->payment->storeCardUserDetails($request);
            return response()->json([
                'success' => true,
            ]);
        }catch(\Exception $e) {
            return response()->json([
               'success' => false,
               'message' => $e->getMessage(),
            ]);
        }
    }

    public function payStackForm(){
        try{
            $contestant = $this->contestant->contestantById(Session::get('contestant_id'));
            return view('contestants.paystack-payment', compact('contestant'));

        }catch(\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function payWithBank(PaymentVoteBankRequest $request){

    }

    /**
     * Redirect the User to Paystack Payment Page
     * @return \Illuminate\Http\JsonResponse
     */
    public function redirectToGateway(){
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            Session::flash('error',$e->getMessage());
        }
    }

    /**
     * Obtain Paystack payment information
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $this->payment->storeCardPayment($paymentDetails);

        return redirect()->route('payments.complete');
        // dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
