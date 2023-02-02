<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Disability;
use App\Models\Barangay;
use Codedge\Fpdf\Fpdf\Fpdf;
use Carbon\Carbon;

class PwdController extends Controller
{
    // protected $fpdf;
    
    // public function __construct()
    // {
    //     $this->fpdf = new Fpdf;
    // }

    public function listPWD(){
        $users = User::with('barangay')->where('type',false)->get();
        return view('admin.pwd',compact('users'));
    }
    public function show($id){
        $brgy = Barangay::get();
        $user = User::with('barangay')->where('type',false)->where('id',$id)->first();
        if($user){
            return view('admin.edit-pwd',compact('user','brgy'));
        }
        return abort(404);
    }
    public function updatePwd(Request $request, $id){
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
            'other_occupation' => 'nullable|string|max:255',
            'blood_type' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255',
            'org_affi' => 'nullable|string|max:255',
            'cont_person' => 'nullable|string|max:255',
            'office_address' => 'nullable|string|max:255',
            'tel_no' => 'nullable|string|max:255',
            'id_ref' => 'nullable|string|max:255',
            'id_ref_no' => 'nullable|string|max:255',
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
        $user = User::findOrFail($id);
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
        $user->other_occupation = $request->other_occupation;
        $user->blood_type = $request->blood_type;
        $user->org_affi = $request->org_affi;
        $user->cont_person = $request->cont_person;
        $user->office_address = $request->office_address;
        $user->tel_no = $request->tel_no;
        $user->id_num = $request->id_ref_no;
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

        return back()->with('message','PWD profile information updated successfully!');
    }

    public function generatePWD(Fpdf $fpdf,$id){
        $brgy = Barangay::get();
        $pwd = User::with('barangay')->where('type',false)->where('id',$id)->first();
        if($pwd){

            $form = "./AF.jpg";
            $fpdf->SetFont('Arial', '', 9);
            $fpdf->AddPage('P', 'Letter');
            $fpdf->SetTitle('Application Form'. ' - '. $pwd->first_name. ' '.$pwd->last_name );            
            $fpdf->Image($form, 0, 0, 216, 280);

            $fpdf->Text(15, 48, $pwd->last_name);
            $fpdf->Text(60, 48, $pwd->first_name);
            $fpdf->Text(105, 48, $pwd->middle_name);
            if($pwd->sufix == "N/A"){
            }else{
                $fpdf->Text(153, 48, $pwd->sufix);
            }
            $fpdf->Text(15, 60.5, Carbon::parse($pwd->birthdate)->format('M d, Y'));
            $fpdf->Text(62, 60, Carbon::parse($pwd->birthdate)->diff(Carbon::now())->format('%y years old'));
            $fpdf->Text(112, 60, $pwd->religion);
            $fpdf->Text(162, 60, $pwd->ethnic_group);
            //Sex
            if($pwd->gender == "Male"){
                $fpdf->Text(22.5, 69.5, "X"); //if male
            }else{
                $fpdf->Text(22.5, 75, "X"); //if female
            }
            //civil status
            if($pwd->civil_status == "Single"){
                $fpdf->Text(55, 68.5, "X"); //if single
            }else if($pwd->civil_status == "Married"){
                $fpdf->Text(100, 68.5, "X"); //if Married
            }else if($pwd->civil_status == "Separated"){
                $fpdf->Text(55, 72.5, "X"); //if separated
            }else if($pwd->civil_status == "Widowed"){
                $fpdf->Text(100, 72.5, "X"); //if Widow
            }else if($pwd->civil_status == "Cohabitation"){
                $fpdf->Text(55, 76.5, "X"); //if cohabitation
            }
            //Blood type
            if($pwd->blood_type == "A+"){
                $fpdf->Text(137, 69.5, "X"); //A+
            }else if($pwd->blood_type == "A-"){
                $fpdf->Text(137.5, 76, "X"); //A-
            }else if($pwd->blood_type == "AB+"){
                $fpdf->Text(155, 69.5, "X"); //AB+
            }else if($pwd->blood_type == "AB-"){
                $fpdf->Text(155, 76, "X"); //AB-
            }else if($pwd->blood_type == "B+"){
                $fpdf->Text(175, 69.5, "X"); //B+
            }else if($pwd->blood_type == "B-"){
                $fpdf->Text(175.5, 76, "X"); //B-
            }else if($pwd->blood_type == "O+"){
                $fpdf->Text(193.5, 69.5, "X"); //O+
            }else if($pwd->blood_type == "O-"){
                $fpdf->Text(194, 76, "X"); //O-
            }
            //Disability
            $disablities = Disability::where('user_id', $id)->first();
            $arr_type = ["Deaf or Hard of Hearing","Intelectual Disability","Learning Disability","Mental Disability","Orthopedic Disability","Physical Disability","Pyschosocial Disability","Speech and Language Impairment","Visual Disability"];
            $i = -1;
            foreach($arr_type as $data){
                $i++;
                if(isset($disablities->type[$i])){
                    if($disablities->type[$i] == "Deaf or Hard of Hearing"){
                        $fpdf->Text(22.5, 85.5, "X");
                    }
                    if($disablities->type[$i] == "Intelectual Disability"){
                        $fpdf->Text(22.5, 90, "X");
                    }
                    if($disablities->type[$i] == "Learning Disability"){
                        $fpdf->Text(22.5, 95, "X");
                    }
                    if($disablities->type[$i] == "Mental Disability"){
                        $fpdf->Text(22.5, 99, "X");
                    }
                    if($disablities->type[$i] == "Orthopedic Disability"){
                        $fpdf->Text(22.5, 103, "X");
                    }

                    if($disablities->type[$i] == "Physical Disability"){
                        $fpdf->Text(80.5, 85.5, "X");
                    }
                    if($disablities->type[$i] == "Pyschosocial Disability"){
                        $fpdf->Text(80.5, 90, "X");
                    }
                    if($disablities->type[$i] == "Speech and Language Impairment"){
                        $fpdf->Text(80.5, 95, "X");
                    }
                    if($disablities->type[$i] == "Visual Disability"){
                        $fpdf->Text(80.5, 99, "X");
                    }
                }
            }
            //Cause
            $arr_cause = ["Acquired","Cancer","Chronic Illness","Congenital/Inborn","Injury","Rare Disease","Autism"];
            $x = -1;
            foreach($arr_cause as $data){
                $x++;
                if(isset($disablities->cause[$x])){
                    if($disablities->cause[$x] == "Acquired"){
                        $fpdf->Text(152, 85.5, "X");
                    }
                    if($disablities->cause[$x] == "Cancer"){
                        $fpdf->Text(152, 90, "X");
                    }
                    if($disablities->cause[$x] == "Chronic Illness"){
                        $fpdf->Text(152, 95, "X");
                    }
                    if($disablities->cause[$x] == "Congenital/Inborn"){
                        $fpdf->Text(152, 99, "X");
                    }
                    if($disablities->cause[$x] == "Injury"){
                        $fpdf->Text(152, 104, "X");
                    }
                    if($disablities->cause[$x] == "Rare Disease"){
                        $fpdf->Text(152, 108, "X");
                    }
                    if($disablities->cause[$x] == "Autism"){
                        $fpdf->Text(152, 113, "X");
                    }
                }
            }
            //Resident Address
            $brgy = Barangay::where('id', $pwd->barangay_id)->first();

            $fpdf->Text(15, 125, $pwd->street);
            $fpdf->Text(54, 125, $brgy->brgy);
            $fpdf->Text(94, 125, $pwd->municipality);
            $fpdf->Text(133, 125, $pwd->province);
            $fpdf->Text(172, 125, $pwd->region);
            //Contact Details
            $fpdf->Text(35, 134, $pwd->landline);
            $fpdf->Text(95, 134, $pwd->contact);
            $fpdf->Text(168, 134, $pwd->email);
            //Educ Att.
            if($pwd->educ_attain == "None"){
                $fpdf->Text(18, 144, "X");
            }else if($pwd->educ_attain == "Elementary Education"){
                $fpdf->Text(18, 148.5, "X");
            }else if($pwd->educ_attain == "High School Education"){
                $fpdf->Text(18, 153, "X");
            }else if($pwd->educ_attain == "College"){
                $fpdf->Text(18, 157.5, "X");
            }else if($pwd->educ_attain == "Postgraduate Program"){
                $fpdf->Text(18, 162, "X");
            }else if($pwd->educ_attain == "Non-Formal Education"){
                $fpdf->Text(18, 166.5, "X");
            }else if($pwd->educ_attain == "Vocational"){
                $fpdf->Text(18, 171, "X");
            }
            //Emp Stat
            if($pwd->emp_stat == "Employed"){
                $fpdf->Text(81, 144, "X");
            }else if($pwd->emp_stat == "Self-employed"){
                $fpdf->Text(81, 148.5, "X");
            }else if($pwd->emp_stat == "Unemployed"){
                $fpdf->Text(81, 153, "X");
            }
            //Category Emp
            if($pwd->emp_stat_cat == "Government"){
                $fpdf->Text(81, 175.5, "X");
            }else if($pwd->emp_stat_cat == "Private"){
                $fpdf->Text(81, 179.5, "X");
            }
            //Emp type
            if($pwd->emp_stat_type == "Permanent/Regular"){
                $fpdf->Text(81, 195.5, "X");
            }else if($pwd->emp_stat_type == "Seasonal"){
                $fpdf->Text(81, 200, "X");
            }else if($pwd->emp_stat_type == "Casual"){
                $fpdf->Text(81, 204.5, "X");
            }else if($pwd->emp_stat_type == "Emergency"){
                $fpdf->Text(81, 209, "X");
            }
            else if($pwd->emp_stat_type == "Job-order"){
                $fpdf->Text(113.5, 209, "X");
            }
            //Occupation
            if($pwd->occupation == "Managers"){
                $fpdf->Text(149, 144, "X");
            }else if($pwd->occupation == "Professionals"){
                $fpdf->Text(149, 148.5, "X");
            }else if($pwd->occupation == "Clerical Support Workers"){
                $fpdf->Text(149, 162, "X");
            }else if($pwd->occupation == "Technician And Associate Professionals"){
                $fpdf->Text(149, 153, "X");
            }else if($pwd->occupation == "Service and Sales Workers"){
                $fpdf->Text(149, 166.5, "X");
            }else if($pwd->occupation == "Skilled Agricultural, Forestry and Fishery Workers"){
                $fpdf->Text(149, 171, "X");
            }else if($pwd->occupation == "Craft and Related Trade Workers"){
                $fpdf->Text(149, 180, "X");
            }else if($pwd->occupation == "Plant and Machine Operators and Assemblers"){
                $fpdf->Text(149, 189, "X");
            }else if($pwd->occupation == "Elementary Occupations"){
                $fpdf->Text(149, 198, "X");
            }else if($pwd->occupation == "Armed Forces Occupations"){
                $fpdf->Text(149, 202.5, "X");
            }else if($pwd->occupation == "Other"){
                $fpdf->Text(149, 207, "X");
                $fpdf->Text(154, 211, $pwd->other_occupation);
            }
            //Organization Info
            $fpdf->Text(15, 223.5, $pwd->org_affi);
            $fpdf->Text(62, 223.5, $pwd->cont_person);
            $fpdf->Text(112, 223.5, $pwd->office_address);
            $fpdf->Text(160, 223.5, $pwd->tel_no);
            //ID REF
            $fpdf->Text(55, 228, $pwd->id_num.' - '.$pwd->id_ref);
            $fpdf->Text(15, 234.5, $pwd->sss_no);
            $fpdf->Text(62, 234.5, $pwd->gis_no);
            $fpdf->Text(112, 234.5, $pwd->pagibig);
            $fpdf->Text(160, 234.5, $pwd->philhealth);
            //Father
            $fpdf->Text(80, 243.5, $pwd->f_lname);
            $fpdf->Text(125, 243.5, $pwd->f_fname);
            $fpdf->Text(170, 243.5, $pwd->f_mname);
            //Mother
            $fpdf->Text(80, 248.5, $pwd->m_lname);
            $fpdf->Text(125, 248.5, $pwd->m_fname);
            $fpdf->Text(170, 248.5, $pwd->m_mname);
            //Guardian
            $fpdf->Text(80, 253.5, $pwd->g_lname);
            $fpdf->Text(125, 253.5, $pwd->g_fname);
            $fpdf->Text(170, 253.5, $pwd->g_mname);

            $fpdf->Output( 'I' ,'Application Form'. ' - '.$pwd->first_name.', '. $pwd->last_name.'.pdf');

            exit;
        }
        return abort(404);
    }

    public function generateID(Fpdf $fpdf,$id){
        $brgy = Barangay::get();
        $pwd = User::with('barangay')->where('type',false)->where('id',$id)->first();
        if($pwd){
            $form = "./ID.png";
            $fpdf->SetFont('Arial', '', 7);
            $fpdf->AddPage('P', 'Letter');
            $fpdf->SetTitle('Identification Information'. ' - '. $pwd->first_name. ' '.$pwd->last_name );            
            $fpdf->Image($form, 0, 0, 216, 280);
            // $data->fullname ($data->sufix == 'N/A') ? '':$data->sufix
            if($pwd->sufix == 'N/A'){
                $fpdf->Text(80, 83, $pwd->fullname);
            }else{
                $fpdf->Text(80, 83, $pwd->fullname.' '.$pwd->sufix);
            }
            //Disability
            $disablities = Disability::where('user_id', $id)->first();
            $arr_type = ["Deaf or Hard of Hearing","Intelectual Disability","Learning Disability","Mental Disability","Orthopedic Disability","Physical Disability","Pyschosocial Disability","Speech and Language Impairment","Visual Disability"];
            $i = -1;
            foreach($arr_type as $data){
                $i++;
                if(isset($disablities->type[$i])){

                    if($disablities->type[$i] == "Deaf or Hard of Hearing"){
                        $val [] = 'Deaf';
                    }
                    if($disablities->type[$i] == "Intelectual Disability"){
                        $val [] ='Intelectual';
                    }
                    if($disablities->type[$i] == "Learning Disability"){
                        $val [] ='Learning';
                    }
                    if($disablities->type[$i] == "Mental Disability"){
                        $val [] ="Mental";
                    }
                    if($disablities->type[$i] == "Orthopedic Disability"){
                        $val [] ="Orthopedic";
                    }

                    if($disablities->type[$i] == "Physical Disability"){
                        $val [] ="Physical";
                    }
                    if($disablities->type[$i] == "Pyschosocial Disability"){
                        $val [] ="Pyschosocial";
                    }
                    if($disablities->type[$i] == "Speech and Language Impairment"){
                        $val [] ="SLI";
                    }
                    if($disablities->type[$i] == "Visual Disability"){
                        $val [] ="Visual";
                    }
                }
            }
            $fpdf->Text(80, 91, implode(",", array_slice($val, 0, 4)));

            $fpdf->Text(125, 100, Carbon::now()->format('y').'-'.str_pad($pwd->id, 5, '0', STR_PAD_LEFT));

            $brgy = Barangay::where('id', $pwd->barangay_id)->first();

            $fpdf->Text(87, 158, "Brgy. ".$brgy->brgy.", Irosin, Sorsogon");

            $fpdf->Text(92, 161, Carbon::parse($pwd->birthdate)->format('M d, Y'));

            $fpdf->Text(134, 161, $pwd->gender);

            $fpdf->Text(91, 164, Carbon::now()->format('M d, Y'));

            $fpdf->Text(137, 164, $pwd->blood_type);

            $fpdf->Output( 'I' ,'Application Form'. ' - '."pwd->lastname".', '. "pwd->firstname".'.pdf');

            exit;
        }
    }
}
