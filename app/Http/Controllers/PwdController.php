<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PwdController extends Controller
{
    public function listPWD(){
        $users = User::with('barangay')->where('type',false)->get();
        return view('admin.pwd',compact('users'));
    }
}
