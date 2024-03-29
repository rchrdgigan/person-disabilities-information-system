<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangay;
use App\Models\User;
use App\Models\Classification;

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
        $admin_count = User::where('type', true)->count();
        $pwd_count = User::where('type', false)->count();
        $blood_count = User::where('blood_type', '<>', 'N/A')->count();
        $classification_count = Classification::count();
        return view('adminHome',compact('brgy_count','pwd_count','admin_count','blood_count','classification_count'));
    }
}
