<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BloodTypeController extends Controller
{
    public function listBloodType(){
        $users = User::where('type',false)->get();
        $aplus = $users->where('blood_type','A+')->count();
        $aminus = $users->where('blood_type','A-')->count();
        $abplus = $users->where('blood_type','AB+')->count();
        $abminus = $users->where('blood_type','AB-')->count();
        $bplus = $users->where('blood_type','B+')->count();
        $bminus = $users->where('blood_type','B-')->count();
        $oplus = $users->where('blood_type','O+')->count();
        $ominus = $users->where('blood_type','O-')->count();
        return view('admin.bloodtype',compact('users','aplus','aminus','abplus','abminus','bplus','bminus','oplus','ominus'));
    }
    public function editBloodType($id){
        $pwd = User::where('type',false)->where('id',$id)->first();
        if($pwd){
            return view('admin.edit-bloodtype',compact('pwd'));
        }
        return abort(404);
    }
    public function updateBloodType(Request $request, $id){
        $validated = $request->validate([
            'bloodtype' => 'required',
        ]);
        $pwd = User::findOrFail($id);
        $pwd->blood_type = $request->bloodtype;
        $pwd->update();
        return redirect()->route('bloodtype')->with('message','Successfully Updated!');
    }
}
