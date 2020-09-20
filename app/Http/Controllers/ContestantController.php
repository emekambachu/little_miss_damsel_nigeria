<?php

namespace App\Http\Controllers;

use App\Contestant;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContestantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contestants = Contestant::orderBy('created_at', 'desc')->paginate(15);
        return view('contestants.index', compact('contestants'));
    }

    public function view($slug){
        $con = Contestant::where('slug', $slug)->get()->first();

        return view('contestants.show', compact('con'));
    }

    public function paystackForm(Request $request, $id){

        $input = $request->all();

        $con = Contestant::find($id);

        $cost = ($input['votes'] * 50) * 100;
        $amount = $input['votes'] * 50;

        session()->put('contestant_id', $con->id);
        session()->put('accname', $input['accname']);
        session()->put('email', $input['email']);
        session()->put('votes', $input['votes']);
        session()->put('cost', $cost);
        session()->put('amount', $amount);

        return redirect('contestant/paystack-payment/'.$con->slug);
    }

    public function paystackPayment($slug){

        $con = Contestant::where('slug', $slug)->get()->first();

        return view('contestants.paystack-payment', compact('con'));
    }

    public function votingComplete(){
        return view('contestants.voting-complete');
    }

    public function bankForm(Request $request, $id){

        $input = $request->all();

        $con = Contestant::find($id);

        $input['amount'] = $input['votes'] * 50;
        $input['contestant_id'] = $con->id;
        $input['payment_method'] = 'bank-payment';

        Payment::create($input);

        Session::flash('success', 'Thank you for voting for '.$con->name.' with '.$input['amount'].'Naira, Your vote will be approved as soon as your payment is confirmed');

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

        })->paginate(15);

        // get total results
        if($contestants->total() > 0){
            $countResults = $contestants->total();
        }else {
            $countResults = 0;
            $emptyResult = $request->input('name');
        }

        if($contestants->first()){
            return view('contestants.search-results',
                compact( 'countResults', 'contestants'));
        }
        return view('contestants.search-results',
            compact( 'countResults', 'contestants', 'emptyResult'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function show(Contestant $contestant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function edit(Contestant $contestant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contestant $contestant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contestant $contestant)
    {
        //
    }
}
