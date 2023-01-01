<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Disability;

class DisablityTypeController extends Controller
{
    public function listDisability(){
        $pwd = User::where('type',false)->orderBy('id','DESC')->get();
        $pwd_disability = Disability::with('user')->orderBy('id','DESC')->get();
        return view('admin.disability', compact('pwd','pwd_disability'));
    }
    public function store(Request $request){

        $validated = $request->validate([
            'user_id' => 'required|unique:disabilities',
            'type' => 'required|array',
            'cause' => 'required|array',
        ]);

        foreach($request->type as $types){
            $arr_types[] = $types;
        }
        
        foreach($request->cause as $causes){
            $arr_causes[] = $causes;
        }

        $disability = Disability::create([
            'user_id' => $request->user_id,
            'type' => $arr_types,
            'cause' => $arr_causes,
        ]);
      
        return redirect()->back()->with('message','Successfully Saved!');
    }
    public function edit(){

    }
    public function update(){
        
    }
}
