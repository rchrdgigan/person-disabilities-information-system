<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classification;

class ClassificationController extends Controller
{
    public function listClassification(){
        $pwd = User::where('type',false)->orderBy('id','DESC')->get();
        $pwd_classification = Classification::with('user')->orderBy('id','DESC')->get();
        return view('admin.classification', compact('pwd','pwd_classification'));
    }
    public function store(Request $request){

        $validated = $request->validate([
            'user_id' => 'required',
            'classification' => 'required',
        ]);

        $disability = Classification::create([
            'user_id' => $request->user_id,
            'classification' => $request->classification,
        ]);
      
        return redirect()->back()->with('message','Successfully Saved!');
    }
    public function edit($id){
        $classification = Classification::findOrFail($id);
        $pwd = User::findOrFail($classification->user_id);
        $pwd_classification= Classification::with('user')->orderBy('id','DESC')->get();
        return view('admin.edit-classification', compact('pwd','pwd_classification','classification'));
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'classification' => 'required',
        ]);

        $classification = Classification::findOrFail($id);
        $classification->classification = $request->classification;
        $classification->update();

        return redirect()->route('classification')->with('message','Successfully Updated!');
    }
    public function destroy(Request $request){
        $del = Classification::findOrFail($request->_id);
        if($del){
            $del->delete();
        }
        return back()->with('message','Data has been deleted!');
    }
}
