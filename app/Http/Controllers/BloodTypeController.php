<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BloodTypeController extends Controller
{
    public function listBloodType(){
        $users = User::where('type',false)->get();
        return view('admin.bloodtype',compact('users'));
    }
}
