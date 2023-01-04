<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barangay;

class PwdController extends Controller
{
    public function listPWD(){
        $users = User::with('barangay')->where('type',false)->get();
        return view('admin.pwd',compact('users'));
    }
    public function show($id){
        $brgy = Barangay::get();
        $user = User::with('barangay')->where('type',false)->where('id',$id)->first();
        if($user){
            return view('admin.show-pwd',compact('user','brgy'));
        }
        return abort(404);
    }
}
