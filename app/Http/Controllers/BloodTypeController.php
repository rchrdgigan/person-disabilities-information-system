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
