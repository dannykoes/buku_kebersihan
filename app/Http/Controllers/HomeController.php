<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // return Auth::user()->role;
        if (Auth::user()->role == 0 && Auth::user()->role == null) {
            return view('backend.beranda');
        } elseif (Auth::user()->role == 1) {
            return view('backend.dashboard.spvdashboard');
        } elseif (Auth::user()->role == 2) {
            return view('backend.dashboard.clcdashboard');
        } else {
            return view('backend.dashboard.petugasdashboard');
        }
    }
}
