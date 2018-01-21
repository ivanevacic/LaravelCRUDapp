<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //See ID of currently logged in user
        $user_id = auth()->user()->id;
        
        //Find user in DB by ID
        $user = User::find($user_id);

        //Return view with all the listings from logged in user
        return view('dashboard')->with('listings', $user->listings);
    }
}
