<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\StationInformation;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
            $stationInformation = StationInformation::first();
            if($usertype=='user')
            {
                return view('dashboard',compact('stationInformation'));
            }
            else if($usertype=='admin')
            {
                return view('dashboardAdmin');
            }
            else return redirect()->back();
        }
        return view('home');
    }
    public function post(){
        return view('post');
    }
}
