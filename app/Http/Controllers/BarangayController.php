<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangay;
use DB;

class BarangayController extends Controller
{
    public function listBarangay(){
        
        $brgys = Barangay::join('users', 'users.brgy_id', '=','barangays.id')
                        ->select(
                            'barangays.brgy as brgy',
                            DB::raw("Count(users.id) as total_users"),
                        )
                        ->groupBy('barangays.brgy')->where('type', false)->get();

        return view('admin.barangay',compact('brgys'));
    }
}
