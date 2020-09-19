<?php

namespace App\Http\Controllers;

use App\LittleMissDamsel;
use App\LMDNapplication;
use Illuminate\Http\Request;

use App\User;
use App\Application;
use App\Image;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $applications = Application::paginate(15);
        $countAllApplications = Application::all()->count();
        $countPaidApplications = Application::where('paid', True)->count();

        return view('admin.index', compact('countAllApplications', 'countPaidApplications', 'applications'));

    }
}
