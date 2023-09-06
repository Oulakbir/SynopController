<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SynopticMessage;
use Illuminate\Support\Facades\Auth;

class ManageController extends Controller
{

    public function index()
    {   
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
            if($usertype=='user')
            {   $username = Auth::user()->name;
                $synopticMessages = SynopticMessage::where('username', $username)->get();
                return view('userMessages',compact('synopticMessages'));
            }
            else if($usertype=='admin')
            {
                $user_table = User::all();
                return view('usertable', compact('user_table'));
            }
            else return redirect()->back();
        }
        return view('Manage');
    }

}
