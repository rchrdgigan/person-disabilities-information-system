<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsNotificationController extends Controller
{
    public function listMessage(){
        return view('admin.notification');
    }
}
