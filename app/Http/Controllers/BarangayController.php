<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barangay;
use DB;

class BarangayController extends Controller
{
    public function listBarangay(){
        $brgys = Barangay::get();
        $users = User::get();
        return view('admin.barangay',compact('brgys','users'));
    }
}
