<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    public function listClassification(){
        return view('admin.classification');
    }
}
