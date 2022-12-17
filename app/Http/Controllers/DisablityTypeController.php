<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisablityTypeController extends Controller
{
    public function listDisability(){
        return view('admin.disability');
    }
}
