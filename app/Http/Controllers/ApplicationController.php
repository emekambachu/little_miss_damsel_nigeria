<?php

namespace App\Http\Controllers;

use App\Application;
use App\Image;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;

// Add for authentication to work
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.applications.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation for image
        $this->validate($request, [
            'image_id'  => 'image|mimes:jpg,jpeg,png,gif|max:5048'
        ]);

        //Request data from fields
        $input = $request->all();

        //Get Image
        if($file = $request->file('image_id')){

            // Add current time in seconds to image
            $name = time() . $file->getClientOriginalName();

            //Move image to photos directory
            $file->move('photos', $name);

            //add image to database
            $photo = Image::create(['img'=>$name]);

            //assign image id to $input array
            $input['image_id'] = $photo->id;
        }

        // create application
        Application::create($input);

        Mail::send('emails.registration', $input, function ($message) use ($input) {
            $message->from('info@kidstarmodels.com', 'Kidstar Models');
            $message->to($input['parent_email'], $input['parent_surname'].' '.$input['parent_othernames'])->cc('info@kidstarmodels.com', 'kidstarmodels@gmail.com');
            $message->replyTo('info@kidstarmodels.com', 'Kidstar Models');
            $message->subject('Your Application has been Submitted');
        });

        //session notification
        Session::flash('success',  'Application has been added');

        return redirect('registration-complete');
    }


    public function lmdnSignupForm(Request $request){

        //Request data from fields
        $input = $request->all();

        Mail::send('emails.lmdn-registration', $input, function ($message) use ($input) {
            $message->from('info@kidstarmodels.com', 'Little Miss Damsel Nigeria');
            $message->to($input['parent_email'], $input['parent_surname'].' '.$input['parent_othernames'])->cc('info@kidstarmodels.com', 'kidstarmodels@gmail.com');
            $message->replyTo('info@kidstarmodels.com', 'Little Miss Damsel Nigeria');
            $message->subject('Your Application has been Submitted');
        });

        return redirect('registration-complete');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::findOrFail($id);
        return view('admin.applications.show', compact('application'));
    }

    public function approve(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        if($application->paid){
            $application->paid = 0;
            Session::flash('danger', 'Application Disapproved');
            $application->save();

        }else{

            if($application->applicationid === Null) {

                // Generate Application ID
                function generateAppicationId($length = 5)
                {
                    $characters = '0123456789';
                    $charactersLength = strlen($characters);
                    $randomString = 'KSM-';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    return $randomString;
                }

                $application->paid = 1;
                $application->applicationid = generateAppicationId();
                $application->save();

                $data = [

                    'applicationid' => $application->applicationid,
                    'surname' => $application->surname,
                    'othernames' => $application->othernames,
                    'nationality' => $application->nationality,
                    'state' => $application->state,
                    'vital_state' => $application->vital_state,
                    'school_name' => $application->school_name,
                    'school_class' => $application->school_class,
                    'age' => $application->age,
                    'height' => $application->height,
                    'bust' => $application->bust,
                    'waist' => $application->waist,
                    'hips' => $application->hips,
                    'parent_surname' => $application->parent_surname,
                    'parent_othernames' => $application->parent_othernames,
                    'parent_mobile' => $application->parent_mobile,
                    'parent_email' => $application->parent_email,

                ];

                // Generate PDF
                $pdf = PDF::loadView('documents.application_receipt', $data);

                Mail::send('emails.application_approved', $data, function ($message) use ($data, $pdf) {
                    $message->from('info@kidstarmodels.com', 'Kidstar Models');
                    $message->to($data['parent_email'], $data['parent_surname'] . ' ' . $data['parent_othernames'])->cc('info@kidstarmodels.com', 'kidstarmodels@gmail.com');
                    $message->replyTo('info@kidstarmodels.com', 'Kidstar Models');
                    $message->subject('Your application has been approved, Download receipt')->attachData($pdf->output(), $data['surname'] . '_' . $data['othernames'] . ".pdf");
                });
            }

            Session::flash('success', 'Application Approved');

        }

        return redirect()->back();
    }

    public function paidApplications()
    {
        $applications = Application::where('paid', True)->paginate(15);
        $countAllApplications = Application::all()->count();
        $countPaidApplications = Application::where('paid', True)->count();

        return view('admin.applications.paid-applications', compact('countAllApplications', 'countPaidApplications', 'applications'));
    }

    public function pendingApplications()
    {
        $applications = Application::where('paid', False)->paginate(15);
        $countAllApplications = Application::all()->count();
        $countPaidApplications = Application::where('paid', True)->count();

        return view('admin.applications.pending-applications', compact('countAllApplications', 'countPaidApplications', 'applications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
