<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangay;

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
        $brgy = Barangay::get();
        return view('home',compact('brgy'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $brgy_count = Barangay::count();
        return view('adminHome',compact('brgy_count'));
    }
}
