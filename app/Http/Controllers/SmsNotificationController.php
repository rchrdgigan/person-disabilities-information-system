<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SmsNotification;
use Vonage;

class SmsNotificationController extends Controller
{
    public function listMessage(){
        $pwd = User::with('barangay')->where('type',false)->get();
        $pwd_smsnotif = SmsNotification::with('user')->orderBy('id','DESC')->get();
        return view('admin.notification', compact('pwd','pwd_smsnotif'));
    }
    public function store(Request $request){
        $validated = $request->all();
        if(isset($validated['user_id'])){
            if(count($validated['user_id'])>0){
                foreach($validated['user_id'] as $data){

                    $user = User::findOrFail($data);
                    $sms = SmsNotification::create([
                        'user_id' => $user->id,
                        'message'=> $request->message,
                    ]);

                    try {
                        $sms = Vonage::message()->send([
                            'to'   => '63'.ltrim($user->contact, '0'),
                            'from' => 'PDAO Irosin',
                            'text' => $request->message
                        ]);
                    } catch(Exception $e) {
                        echo 'Something wrong in API: ' .$e->getMessage();
                    }
                    
                }

                if($sms){
                    return back()->with('message', 'Message sent!');
                }
                return back()->with('error', 'Message not send!');
            }
        }else{

            $sms = SmsNotification::create([
                'user_id' => $request->_id,
                'message'=> $request->message,
            ]);

            $user = User::findOrFail($request->_id);
            try {
                $sms = Vonage::message()->send([
                    'to'   => '63'.ltrim($user->contact,'0'),
                    'from' => 'PDAO Irosin',
                    'text' => $request->message
                ]);
            } catch(Exception $e) {
                echo 'Something wrong in API: ' .$e->getMessage();
            }

            if($sms){
                return back()->with('message', 'Message sent!');
            }
            return back()->with('error', 'Message not send!');
        }
    }
    public function destroy(Request $request){
        $del = SmsNotification::findOrFail($request->_id);
        if($del){
            $del->delete();
        }
        return back()->with('message','Data has been deleted!');
    }
}
