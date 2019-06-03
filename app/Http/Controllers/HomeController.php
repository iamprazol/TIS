<?php

namespace App\Http\Controllers;

use App\Purpose;
use App\UserPurpose;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $purposes = Purpose::all();
        $userpurpose = UserPurpose::all();
        return view('charts.purpose')->with('purposes', $purposes)->with('userpurpose', $userpurpose);    }
}
