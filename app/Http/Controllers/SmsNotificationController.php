<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SmsNotificationController extends Controller
{
    public function listMessage(){
        $pwd = User::with('barangay')->where('type',false)->get();
        return view('admin.notification', compact('pwd'));
    }
}
