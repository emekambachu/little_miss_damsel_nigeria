<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; //Imported Mail class
use Illuminate\Support\Facades\Session; //this must be included for using flash sessions
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class WebsiteController extends Controller
{
    public function contactForm(Request $request){

        // get all form fields with array
        // $input = $request->all();

        $input = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'yourmessage' => 'required|string',
        ]);

        //send email
        Mail::send('emails.contact', $input, static function($message) use ($input){
            $message->from($input['email'], $input['name']);
            $message->to('info@littlemissdamselnigeria.com', 'Little Miss Damsel Nigeria')->cc('kidstarmodels@gmail.com');
            $message->replyTo('noreply@littlemissdamselnigeria.com', 'No Reply');
            $message->subject('Contact From Client');
        });

        //flash notification
        Session::flash('success', 'Message Sent');
        return redirect()->back();

    }
}
