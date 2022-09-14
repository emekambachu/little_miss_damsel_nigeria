<?php

namespace App\Http\Controllers\Home\Payment;

use App\Contestant;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Payment;
use App\Reservation;
use Illuminate\Support\Facades\Session;
use Unicodeveloper\Paystack\Facades\Paystack;


class HomePaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectToGateway()
    {
//        try{
//            return Paystack::getAuthorizationUrl()->redirectNow();
//
//        }catch(\Exception $e) {
//            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
//        }
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        if($paymentDetails['data']['status'] === 'success'){

            // Save to db
            $payment_successful = Payment::create([
                'contestant_id' => $paymentDetails['data']['metadata']['contestant_id'],
                'accname' => $paymentDetails['data']['metadata']['name'],
                'email' => $paymentDetails['data']['customer']['email'],
                'amount' => Session::get('amount'),
                'votes' => Session::get('votes'),
                'status' => 1,
                'payment_method' => 'paystack',
            ]);

            if($payment_successful){
                $con = Contestant::where('id', $payment_successful->contestant_id)->get()->first();

                $con->votes += $payment_successful->votes;
                $con->save();
            }

            return redirect('contestants/voting-complete');
        }

        Session::flash('danger',  'Payment Failed, check your account balance or try again');
        return redirect();


//        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
