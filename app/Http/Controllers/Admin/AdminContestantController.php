<?php

namespace App\Http\Controllers\Admin;

use App\Contestant;
use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminContestantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contestants = Contestant::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.contestants.index', compact('contestants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.contestants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|unique:contestants,name',
            'image' => 'required|mimes:jpg,jpeg,png|image',
        ]);

        $input = $request->all();

        //Get Image
        if($file = $request->file('image')){

            // path for converted image
            $converted_path = 'photos';

            // Add current time in seconds to file name
            $name = time() . $file->getClientOriginalName();

            // create canvas background to hold the image (Must install Image Intervention Package first)
            $background = Image::canvas(700, 905);

            // start image conversion (Must install Image Intervention Package first)
            $convert_image = Image::make($file->path());

            // resize image and save to converted path
            // resize and fit width
            $convert_image->resize(700, 905, static function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // insert image to canvas
            $background->insert($convert_image, 'center');

            $background->save($converted_path.'/'.$name);

            //assign image name to $input array
            $input['image'] = $name;
        }

        $input['slug'] = Str::slug($input['name']);

        if(Contestant::create($input)){
            Session::flash('success', 'submitted');
        }else{
            Session::flash('warning',  'Unable to submit, Something went wrong');
        }

        return redirect()->back();
    }

    public function search(Request $request){

        $input = $request->input('name');

        // Using Like and foreach search
        $searchValues = explode(' ', $input);

        $contestants = Contestant::where(static function($query) use($searchValues){

            foreach ($searchValues as $value) {
                $query->where('contestants.name', 'LIKE', '%' . $value . '%');
            }

            })->paginate(9);

        // get total results
        if($contestants->total() > 0){
            $countResults = $contestants->total();
        }else {
            $countResults = 0;
            $emptyResult = $request->input('name');
        }

        if($contestants->first()){
            return view('admin.contestants.search-results',
                compact( 'countResults', 'contestants'));
        }
        return view('admin.contestants.search-results',
            compact( 'countResults', 'contestants', 'emptyResult'));
    }

    public function payments()
    {
        $payments = Payment::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.contestants.payments', compact('payments'));
    }

    public function searchPayments(Request $request){

        $input = $request->input('name');

        // Using Like and foreach search
        $searchValues = explode(' ', $input);

        $payments = Payment::join('contestants', 'contestants.id', '=', 'payments.contestant_id')
            ->select('contestants.*' , 'payments.*')
            ->where(static function($query) use($searchValues){
                foreach ($searchValues as $value) {
                    $query->where('payments.accname', 'LIKE', '%' . $value . '%');
                }

            })->orWhere(static function ($query) use($searchValues){
                foreach($searchValues as $value) {
                    $query->orWhere('contestants.name', 'LIKE', '%' . $value . '%');
                }

            })->paginate(15);

        // get total results
        if($payments->total() > 0){
            $countResults = $payments->total();
        }else{
            $countResults = 0;
            $emptyResult = $request->input('name');
        }

        if($payments->first()){
            return view('admin.contestants.payment-search-results',
                compact( 'countResults', 'payments'));
        }

        return view('admin.contestants.payment-search-results',
            compact( 'countResults', 'payments', 'emptyResult'));
    }

    public function approve($id){

        $pay = Payment::find($id);
        $contestant = Contestant::where('id', $pay->contestant_id)->get()->first();

        if($pay->status){
            // deduct votes from contestant
            $contestant->votes -= $pay->votes;

            $pay->status = 0;
            Session::flash('warning', $pay->accname.' payment has been un-approved');

        }else{
            // add votes to contestant
            $contestant->votes += $pay->votes;

            $pay->status = 1;
            Session::flash('success', $pay->accname.' has been approved');
        }

        // save both contestant and payment
        $contestant->save();
        $pay->save();

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $contestant = Contestant::findOrFail($id);

        return view('admin.contestants.edit', compact('contestant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5|unique:contestants,name,'.$id,
            'image' => 'nullable|mimes:jpg,jpeg,png|image',
        ]);

        $contestant = Contestant::find($id);

        $input = $request->except('_token', '_method');

        //Get Image
        if($file = $request->file('image')){

            // path for converted image
            $converted_path = 'photos';

            // Add current time in seconds to file name
            $name = time() . $file->getClientOriginalName();

            // create canvas background to hold the image (Must install Image Intervention Package first)
            $background = Image::canvas(700, 905);

            // start image conversion (Must install Image Intervention Package first)
            $convert_image = Image::make($file->path());

            // resize image and save to converted path
            // resize and fit width
            $convert_image->resize(700, 905, static function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // insert image to canvas
            $background->insert($convert_image, 'center');

            $background->save($converted_path.'/'.$name);

            //assign image name to $input array
            $input['image'] = $name;
        }

        $input['slug'] = Str::slug($input['name']);

        Contestant::where([
            ['id', '=', $contestant->id]
        ])->update($input);

        Session::flash('success', $input['name'].' Has been updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
