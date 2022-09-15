<?php

namespace App\Http\Controllers\Home\Contestant;

use App\Contestant;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Services\Contestant\ContestantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeContestantController extends Controller
{
    private $contestant;
    public function __construct(ContestantService $contestant){
        $this->contestant = $contestant;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('contestants.index');
    }

    public function contestants(): \Illuminate\Http\JsonResponse
    {
        try {
            $contestants = $this->contestant->contestantWithRelations()
                ->latest()->paginate(10);
            return response()->json([
                'success' => true,
                'contestants' => $contestants,
                'total' => $contestants->total(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function show($slug){

        try {
            $contestant = $this->contestant->contestantBySlug($slug);
            return view('contestants.show', compact('contestant'));

        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }


    }

    public function showContestant($slug): \Illuminate\Http\JsonResponse
    {
        try {
            $contestant = $this->contestant->contestantBySlug($slug);
            return response()->json([
                'success' => true,
                'contestant' => $contestant,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
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

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $contestants = $this->contestant->searchContestant($request);
            return response()->json([
                'success' => true,
                'contestants' => $contestants['contestants'],
                'total' => $contestants['total'],
                'search_values' => $contestants['search_values'],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }


}
