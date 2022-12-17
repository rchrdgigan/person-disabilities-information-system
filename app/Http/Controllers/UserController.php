<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use File;

class UserController extends Controller
{
    public function updateUser(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'sufix' => 'nullable|string|max:10',
            'gender' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'ethnic_group' => 'required|string|max:255',
            'birthdate' => 'required|date|max:255',
            'civil_status' => 'required|string|max:255',
            'barangay_id' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'landline' => 'nullable|string|max:255',
            'educ_attain' => 'required|string|max:255',
            'emp_stat' => 'nullable|string|max:255',
            'emp_stat_cat' => 'nullable|string|max:255',
            'emp_stat_type' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'blood_type' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255',
            'org_affi' => 'nullable|string|max:255',
            'cont_person' => 'nullable|string|max:255',
            'office_address' => 'nullable|string|max:255',
            'tel_no' => 'nullable|string|max:255',
            'id_ref' => 'nullable|string|max:255',
            'sss_no' => 'nullable|string|max:255',
            'gis_no' => 'nullable|string|max:255',
            'pagibig' => 'nullable|string|max:255',
            'philhealth' => 'nullable|string|max:255',
            'f_lname' => 'nullable|string|max:255',
            'f_fname' => 'nullable|string|max:255',
            'f_mname' => 'nullable|string|max:255',
            'm_lname' => 'nullable|string|max:255',
            'm_fname' => 'nullable|string|max:255',
            'm_mname' => 'nullable|string|max:255',
            'g_lname' => 'nullable|string|max:255',
            'g_fname' => 'nullable|string|max:255',
            'g_mname' => 'nullable|string|max:255',
        ]);
        $user = User::findOrFail(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->sufix = $request->sufix;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->ethnic_group = $request->ethnic_group;
        $user->birthdate = $request->birthdate;
        $user->civil_status = $request->civil_status;
        $user->barangay_id = $request->barangay_id;
        $user->street = $request->street;
        $user->municipality = $request->municipality;
        $user->province = $request->province;
        $user->region = $request->region;
        $user->contact = $request->contact;
        $user->landline = $request->landline;
        $user->educ_attain = $request->educ_attain;
        $user->emp_stat = $request->emp_stat;
        $user->emp_stat_cat = $request->emp_stat_cat;
        $user->emp_stat_type = $request->emp_stat_type;
        $user->occupation = $request->occupation;
        $user->blood_type = $request->blood_type;
        $user->org_affi = $request->org_affi;
        $user->cont_person = $request->cont_person;
        $user->office_address = $request->office_address;
        $user->tel_no = $request->tel_no;
        $user->id_ref = $request->id_ref;
        $user->sss_no = $request->sss_no;
        $user->gis_no = $request->gis_no;
        $user->pagibig = $request->pagibig;
        $user->philhealth = $request->philhealth;
        $user->f_lname = $request->f_lname;
        $user->f_fname = $request->f_fname;
        $user->f_mname = $request->f_mname;
        $user->m_lname = $request->m_lname;
        $user->m_fname = $request->m_fname;
        $user->m_mname = $request->m_mname;
        $user->g_lname = $request->g_lname;
        $user->g_fname = $request->g_fname;
        $user->g_mname = $request->g_mname;
        $user->email = $request->email;
        $user->update();


        return back()->with('message','User profile information updated successfully!');
    }
}
