<?php

namespace App\Http\Controllers;

use App\Application;
use App\Image;
use Barryvdh\DomPDF\Facade as PDF;

use Dompdf\Exception;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.applications.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // validation for image
        $this->validate($request, [
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5048'
        ]);

        //Request data from fields
        $input = $request->all();

        //Get Image
        if($file = $request->file('image')){

            // Add current time in seconds to image
            $name = time() . $file->getClientOriginalName();

            //Move image to photos directory
            $file->move('photos', $name);

            //assign image id to $input array
            $input['image'] = $name;
        }

        // create application
        Application::create($input);

        Mail::send('emails.registration', $input, static function ($message) use ($input) {
            $message->from('info@littlemissdamselnigeria.com', 'Little Miss Damsel Nigeria');
            $message->to($input['parent_email'], $input['parent_surname'].' '.$input['parent_other_names'])
                ->cc('info@littlemissdamselnigeria.com', 'kidstarmodels@gmail.com');
            $message->replyTo('info@littlemissdamselnigeria.com', 'Little Miss Damsel Nigeria');
            $message->subject('LMDN: Application Submitted');
        });

        //session notification
        Session::flash('success',  'Application has been added');

        return redirect('registration-complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
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

            if($application->application_id === Null) {

                // Generate Application ID
                function generateAppicationId($length = 5)
                {
                    $characters = '0123456789';
                    $charactersLength = strlen($characters);
                    $randomString = 'LMDN';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    return $randomString;
                }

                $application->paid = 1;
                $application->application_id = generateAppicationId();
                $application->save();

                $data = [
                    'application_id' => $application->application_id,
                    'surname' => $application->surname,
                    'other_names' => $application->other_names,
                    'country' => $application->country,
                    'state' => $application->state,
                    'city' => $application->city,
                    'vital_state' => $application->vital_state,
                    'school_name' => $application->school_name,
                    'school_class' => $application->school_class,
                    'age' => $application->age,
                    'height' => $application->height,
                    'bust' => $application->bust,
                    'waist' => $application->waist,
                    'hips' => $application->hips,
                    'parent_surname' => $application->parent_surname,
                    'parent_other_names' => $application->parent_other_names,
                    'parent_mobile' => $application->parent_mobile,
                    'parent_email' => $application->parent_email,
                ];


                try{
                // Generate PDF
                $pdf = PDF::loadView('documents.application_receipt', $data);

                Mail::send('emails.application_approved', $data, static function ($message) use ($data, $pdf) {
                    $message->from('info@littlemissdamselnigeria.com', 'Little Miss Damsel Nigeria');
                    $message->to($data['parent_email'], $data['parent_surname'] . ' ' . $data['parent_other_names'])
                        ->cc('info@littlemissdamselnigeria.com', 'Little Miss Damsel Nigeria');
                    $message->replyTo('info@littlemissdamselnigeria.com', 'Little Miss Damsel Nigeria');
                    $message->subject('Your application has been approved, Download receipt')
                        ->attachData($pdf->output(), $data['surname'] . '_' . $data['other_names'] . ".pdf");
                });

                }catch(Exception $exception){
                    $this->serverstatuscode = "0";
                    $this->serverstatusdes = $exception->getMessage();
                }
                if (Mail::failures()) {
                    $this->statusdesc  =   "Error sending mail";
                    $this->statuscode  =   "0";

                }else{

                    $this->statusdesc  =   "Message sent Succesfully";
                    $this->statuscode  =   "1";
                }
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
