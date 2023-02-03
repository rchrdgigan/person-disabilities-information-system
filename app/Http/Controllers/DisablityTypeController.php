<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Disability;

class DisablityTypeController extends Controller
{
    public function listDisability(){
        $pwd = User::where('type',false)->orderBy('id','DESC')->get();
        $pwd_disability = Disability::with('user')->where('is_archived',false)->orderBy('id','DESC')->get();
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
    public function edit($id){
        $disablities = Disability::findOrFail($id);
        $pwd = User::findOrFail($disablities->user_id);
        $pwd_disability = Disability::with('user')->orderBy('id','DESC')->get();
        return view('admin.edit-disability', compact('pwd','pwd_disability','disablities'));
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'type' => 'required|array',
            'cause' => 'required|array',
        ]);

        foreach($request->type as $types){
            $arr_types[] = $types;
        }
        
        foreach($request->cause as $causes){
            $arr_causes[] = $causes;
        }

        $disablities = Disability::findOrFail($id);
        $disablities->type = $arr_types;
        $disablities->cause = $arr_causes;
        $disablities->update();

        return redirect()->route('disability')->with('message','Successfully Updated!');
    }
    public function destroy(Request $request){
        $del = Disability::findOrFail($request->_id);
        if($del){
            $del->delete();
        }
        return back()->with('message','Data has been deleted!');
    }
    public function archive(Request $request){
        $arc = Disability::findOrFail($request->_id);
        if($arc){
            $arc->is_archived = true;
            $arc->update();
        }
        return back()->with('message','Data has been archived!');
    }
    public function archiveList(Request $request){
        $pwd = User::where('type',false)->orderBy('id','DESC')->get();
        $pwd_disability = Disability::with('user')->where('is_archived',true)->orderBy('id','DESC')->get();
        return view('admin.disability', compact('pwd','pwd_disability'));
    }
}
