@extends('layouts.app')
@push('links')

@endpush
@section('content')
<div class="container mb-4">
<form action="{{route('home.update.profile')}}" method="POST" enctype="multipart/form-data">
@method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
        @if(session('message'))
            <div class="alert alert-primary alert-dismissible">
                {{ session('message') }}
                
            </div>
        @endif
        </div>
    </div>
    <div class="row">
        <!-- <div class="col-md-4">
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body box-profile">
                    <div class="container">
                        <div class="picture-container">
                            <div class="picture">
                                <img src="/public/users_image/{{auth()->user()->image}}" class="picture-src" id="wizardPicturePreview" title="">
                                <input type="file" name="image" id="wizard-picture" class="">
                            </div>
                            <h6 class="">Choose Picture</h6>
                        </div>
                    </div>
                    
                    <h3 class="profile-username text-center mb-3">{{auth()->user()->first_name}} {{auth()->user()->middle_name}} {{auth()->user()->last_name}}</h3>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>Email : </b><span>{{auth()->user()->email}}</span>
                        </li>
                        <li class="list-group-item">
                        <b>Address : </b><span>{{Auth::user()->street}}, Brgy. {{Auth::user()->brgy}}, {{Auth::user()->municipality}}, {{Auth::user()->province}}</span>
                        </li>
                        <li class="list-group-item text-end">
                        <button type="submit" class="btn btn-secondary text-white btn-block"><i class="fa fa-floppy-disk" aria-hidden="true"></i> Save Profile</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
        <div class="col-md-12">
            <div class="card">
                <div class="row">   
                    <div class="col-12">
                        <a href="{{route('genpdf', auth()->user()->id)}}" class="btn btn-secondary text-white btn-block m-2"><i class="fa fa-download" aria-hidden="true"></i> Generate Application Form</a>
                    </div>
                </div>
                
                <ul class="nav nav-tabs pt-2" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Personal Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Other Information</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        
                        <div class="card-body box-profile">
                            <div class="row">
                                <div class="col-6">
                                    <label for="fname" class="pt-2 pb-1"><b>First Name</b></label>
                                    <input id="fname" value="{{auth()->user()->first_name}}" onkeydown="return /[a-z, ]/i.test(event.key)" name="first_name" type="text" class="@error('fname') is-invalid @enderror form-control" 
                                            placeholder="Enter First Name" required>

                                    <label for="lname" class="pt-2 pb-1"><b>Last Name</b></label>
                                    <input id="lname" value="{{auth()->user()->last_name}}" onkeydown="return /[a-z, ]/i.test(event.key)" name="last_name" type="text" class="@error('lname') is-invalid @enderror form-control" 
                                            placeholder="Enter First Name" required>
                                </div>

                                <div class="col-6">
                                    <label for="mname" class="pt-2 pb-1"><b>Middle Name (Optional)</b></label>
                                    <input id="mname" value="{{auth()->user()->middle_name}}" onkeydown="return /[a-z, ]/i.test(event.key)" name="middle_name" type="text" class="@error('mname') is-invalid @enderror form-control" 
                                            placeholder="Enter Middle Name">


                                    <label for="sufix" class="pt-2 pb-1"><b>Sufix</b></label>
                                    <div class="input-group">
                                        
                                        <select class="form-select" name="sufix" id="inputGroupSelect01" required>
                                            <option value="">Please select</option>
                                            <option {{(auth()->user()->sufix == "N/A") ? "selected" : ""}} value="N/A">Not Applicable</option>
                                            <option {{(auth()->user()->sufix == "Jr.") ? "selected" : ""}} value="Jr.">Jr.</option>
                                            <option {{(auth()->user()->sufix == "Sr.") ? "selected" : ""}} value="Sr.">Sr.</option>
                                            <option {{(auth()->user()->sufix == "I") ? "selected" : ""}} value="I">I</option>
                                            <option {{(auth()->user()->sufix == "II") ? "selected" : ""}} value="II">II</option>
                                            <option {{(auth()->user()->sufix == "III") ? "selected" : ""}} value="III">III</option>
                                            <option {{(auth()->user()->sufix == "IV") ? "selected" : ""}} value="IV">IV</option>
                                            <option {{(auth()->user()->sufix == "V") ? "selected" : ""}} value="V">V</option>
                                            <option {{(auth()->user()->sufix == "VI") ? "selected" : ""}} value="VI">VI</option>
                                            <option {{(auth()->user()->sufix == "VII") ? "selected" : ""}} value="VII">VII</option>
                                            <option {{(auth()->user()->sufix == "VIII") ? "selected" : ""}} value="VIII">VIII</option>
                                            <option {{(auth()->user()->sufix == "IX") ? "selected" : ""}} value="IX">IX</option>
                                            <option {{(auth()->user()->sufix == "X") ? "selected" : ""}} value="X">X</option>
                                            <option {{(auth()->user()->sufix == "XI") ? "selected" : ""}} value="XI">XI</option>
                                            <option {{(auth()->user()->sufix == "XII") ? "selected" : ""}} value="XII">XII</option>
                                            <option {{(auth()->user()->sufix == "XIII") ? "selected" : ""}} value="XIII">XIII</option>
                                            <option {{(auth()->user()->sufix == "XIV") ? "selected" : ""}} value="XIV">XIV</option>
                                            <option {{(auth()->user()->sufix == "XV") ? "selected" : ""}} value="XV">XV</option>
                                            <option {{(auth()->user()->sufix == "XVI") ? "selected" : ""}} value="XVI">XVI</option>
                                            <option {{(auth()->user()->sufix == "XVII") ? "selected" : ""}} value="XVII">XVII</option>
                                            <option {{(auth()->user()->sufix == "XVIII") ? "selected" : ""}} value="XVIII">XVIII</option>
                                            <option {{(auth()->user()->sufix == "XIX") ? "selected" : ""}} value="XIX">XIX</option>
                                            <option {{(auth()->user()->sufix == "XX") ? "selected" : ""}} value="XX">XX</option>
                                            <option {{(auth()->user()->sufix == "XXI") ? "selected" : ""}} value="XXI">XXI</option>
                                            <option {{(auth()->user()->sufix == "XXII") ? "selected" : ""}} value="XXII">XXII</option>
                                            <option {{(auth()->user()->sufix == "XXIII") ? "selected" : ""}} value="XXIII">XXIII</option>
                                            <option {{(auth()->user()->sufix == "XXIV") ? "selected" : ""}} value="XXIV">XXIV</option>
                                            <option {{(auth()->user()->sufix == "XXV") ? "selected" : ""}} value="XXV">XXV</option>
                                            <option {{(auth()->user()->sufix == "XXVI") ? "selected" : ""}} value="XXVI">XXVI</option>
                                            <option {{(auth()->user()->sufix == "XXVII") ? "selected" : ""}} value="XXVII">XXVII</option>
                                            <option {{(auth()->user()->sufix == "XXVIII") ? "selected" : ""}} value="XXVIII">XXVIII</option>
                                        </select>
                                    </div>
                                    @error('sufix')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="gender" class="pt-2 pb-1"><b>Gender</b></label>
                                    <div class="input-group">
                                        
                                        <select class="form-select" name="gender" id="inputGroupSelect01" required>
                                            <option {{(auth()->user()->gender == "Male") ? "selected" : ""}} value="Male">Male</option>
                                            <option {{(auth()->user()->gender == "Female") ? "selected" : ""}} value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="bdate" class="pt-2 pb-1"><b>Birth Date</b></label>
                                    <input id="bdate" name="birthdate" value="{{Carbon\Carbon::parse(auth()->user()->birthdate)->format('Y-m-d')}}" type="date" class="@error('bdate') is-invalid @enderror form-control" required>
                                </div>

                                <div class="col-12">
                                    <label for="civil_status" class="pt-2 pb-1"><b>Civil Status</b></label>
                                    <div class="input-group">
                                        
                                        <select class="form-select" name="civil_status" id="inputGroupSelect01" required>
                                            <option value="">Please select</option>  
                                            <option {{(auth()->user()->civil_status == "Single") ? "selected" : ""}} value="Single">Single</option>
                                            <option {{(auth()->user()->civil_status == "Married") ? "selected" : ""}} value="Married">Married</option>
                                            <option {{(auth()->user()->civil_status == "Separated") ? "selected" : ""}} value="Separated">Separated</option>
                                            <option {{(auth()->user()->civil_status == "Widowed") ? "selected" : ""}} value="Widowed">Widow/er</option>
                                            <option {{(auth()->user()->civil_status == "Cohabitation") ? "selected" : ""}} value="Cohabitation">Co-Habitation (live-in)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="age" class="pt-2 pb-1"><b>Age</b></label>
                                    <input id="age" value="{{\Carbon\Carbon::parse(auth()->user()->birthdate)->diff(\Carbon\Carbon::now())->format('%y years old')}}" type="text" class="@error('age') is-invalid @enderror form-control" 
                                            readonly required>
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="ethnic_group" class="pt-2 pb-1"><b>Ethnic Group</b></label>
                                    <input id="ethnic_group" name="ethnic_group" value="{{auth()->user()->ethnic_group}}" type="text" class="@error('ethnic_group') is-invalid @enderror form-control" 
                                            placeholder="Enter Ethnic Group" required>
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="blood_type" class="pt-2 pb-1"><b>Blood Type</b></label>
                                    <div class="input-group">
                                        
                                        <select class="form-select" name="blood_type" id="inputGroupSelect01" required>
                                            <option value="">Please select</option>    
                                            <option {{(auth()->user()->blood_type == "N/A") ? "selected" : ""}} value="N/A">Not Available</option> 
                                            <option {{(auth()->user()->blood_type == "A+") ? "selected" : ""}} value="A+">A+</option>
                                            <option {{(auth()->user()->blood_type == "A-") ? "selected" : ""}} value="A-">A-</option>
                                            <option {{(auth()->user()->blood_type == "AB+") ? "selected" : ""}} value="AB+">AB+</option>
                                            <option {{(auth()->user()->blood_type == "AB-") ? "selected" : ""}} value="AB-">AB-</option>
                                            <option {{(auth()->user()->blood_type == "B+") ? "selected" : ""}} value="B+">B+</option>
                                            <option {{(auth()->user()->blood_type == "B-") ? "selected" : ""}} value="B-">B-</option>
                                            <option {{(auth()->user()->blood_type == "O+") ? "selected" : ""}} value="O+">O+</option>
                                            <option {{(auth()->user()->blood_type == "O-") ? "selected" : ""}} value="O-">O-</option>
                                        </select>
                                        @error('blood_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="email" class="pt-2 pb-1"><b>Email</b></label>
                                    <input id="email" value="{{auth()->user()->email}}" name="email"  type="email" class="@error('email') is-invalid @enderror form-control" 
                                            placeholder="Enter Email Ex: user@domain.com" required>
                                    @error('email')
                                        <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror     
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="contact" class="pt-2 pb-1"><b>Contact</b></label>
                                    <input id="contact" value="{{auth()->user()->contact}}" name="contact" minlength="11" maxlength="11" type="text" class="@error('contact') is-invalid @enderror form-control" 
                                            placeholder="Enter Contact Ex: 09XXXXXXXXX" required>
                                    @error('contact')
                                        <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="landline" class="pt-2 pb-1"><b>Landline Number</b></label>
                                    <input id="landline" name="landline" value="{{auth()->user()->landline}}" type="text" class="@error('landline') is-invalid @enderror form-control" 
                                            placeholder="Enter landline">
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="street" class="pt-2 pb-1"><b>Street</b></label>
                                    <input id="street" name="street" value="{{auth()->user()->street}}" type="text" class="@error('street') is-invalid @enderror form-control" 
                                            placeholder="Enter Street" required>
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="barangay_id" class="pt-2 pb-1"><b>Brgy:</b></label>
                                    <div class="input-group">
                                       
                                        <select class="form-select" name="barangay_id" id="barangay_id" required>
                                            <option value="">Please select</option>   
                                            @foreach($brgy as $data)  
                                                <option {{(auth()->user()->barangay_id == $data->id) ? "selected" : ""}} value="{{$data->id}}">{{$data->brgy}}</option>
                                            @endforeach
                                        </select>
                                        @error('barangay_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="municipality" class="pt-2 pb-1"><b>Municipality</b></label>
                                    <input id="municipality" name="municipality" value="{{auth()->user()->municipality}}" type="text" class="@error('municipality') is-invalid @enderror form-control" 
                                            placeholder="Enter municipality" required>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="province" class="pt-2 pb-1"><b>Province</b></label>
                                    <input id="province" name="province" value="{{auth()->user()->province}}" type="text" class="@error('province') is-invalid @enderror form-control" 
                                            placeholder="Enter province" required>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="region" class="pt-2 pb-1"><b>Region</b></label>
                                    <input id="region" name="region" value="{{auth()->user()->region}}" type="text" class="@error('region') is-invalid @enderror form-control" 
                                            placeholder="Enter region" required>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="religion" class="pt-2 pb-1"><b>Religion</b></label>
                                    <input id="religion" name="religion" value="{{auth()->user()->religion}}" type="text" class="@error('religion') is-invalid @enderror form-control" 
                                            placeholder="Enter religion" required>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="educ_attain" class="pt-2 pb-1"><b>Educational Attainment</b></label>
                                    <div class="input-group">
                                        
                                    
                                        <select class="form-select" name="educ_attain" id="inputGroupSelect01" required>
                                            <option value="">Please select</option>    
                                            <option {{(auth()->user()->educ_attain == "None") ? "selected" : ""}} value="None">None</option>
                                            <option {{(auth()->user()->educ_attain == "Elementary Education") ? "selected" : ""}} value="Elementary Education">Elementary Education</option>
                                            <option {{(auth()->user()->educ_attain == "High School Education") ? "selected" : ""}} value="High School Education">High School Education</option>
                                            <option {{(auth()->user()->educ_attain == "College") ? "selected" : ""}} value="College">College</option>
                                            <option {{(auth()->user()->educ_attain == "Postgraduate Program") ? "selected" : ""}} value="Postgraduate Program">Postgraduate Program</option>
                                            <option {{(auth()->user()->educ_attain == "Non-Formal Education") ? "selected" : ""}} value="Non-Formal Education">Non-Formal Education</option>
                                            <option {{(auth()->user()->educ_attain == "Vocational") ? "selected" : ""}} value="Vocational">Vocational</option>
                                        </select>
                                        @error('educ_attain')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="emp_stat" class="pt-2 pb-1"><b>Status of Employment</b></label>
                                    <div class="input-group">
                                        
                                        <select class="form-select" name="emp_stat" id="inputGroupSelect01" required>
                                            <option value="">Please select</option>    
                                            <option {{(auth()->user()->emp_stat == "None") ? "selected" : ""}} value="None">None</option>
                                            <option {{(auth()->user()->emp_stat == "Employed") ? "selected" : ""}} value="Employed">Employed</option>
                                            <option {{(auth()->user()->emp_stat == "Self-employed") ? "selected" : ""}} value="Self-employed">Self-employed</option>
                                            <option {{(auth()->user()->emp_stat == "Unemployed") ? "selected" : ""}} value="Unemployed">Unemployed</option>   
                                        </select>
                                        @error('emp_stat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="emp_stat_cat" class="pt-2 pb-1"><b>Category of Employment</b></label>
                                    <div class="input-group">
                                        
                                        <select class="form-select" name="emp_stat_cat" id="inputGroupSelect01" required>
                                            <option value="">Please select</option>   
                                            <option {{(auth()->user()->emp_stat_cat == "None") ? "selected" : ""}} value="None">None</option>
                                            <option {{(auth()->user()->emp_stat_cat == "Government") ? "selected" : ""}} value="Government">Government</option>
                                            <option {{(auth()->user()->emp_stat_cat == "Private") ? "selected" : ""}} value="Private">Private</option> 
                                        </select>
                                        @error('emp_stat_cat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="emp_stat_type" class="pt-2 pb-1"><b>Types of Employment (Optional)</b></label>
                                    <div class="input-group">
                                        
                                        <select class="form-select" name="emp_stat_type" id="inputGroupSelect01" required>
                                            <option value="">Please select</option>   
                                            <option {{(auth()->user()->emp_stat_type == "None") ? "selected" : ""}} value="None">None</option>
                                            <option {{(auth()->user()->emp_stat_type == "Permanent/Regular") ? "selected" : ""}} value="Permanent/Regular">Permanent/Regular</option>
                                            <option {{(auth()->user()->emp_stat_type == "Seasonal") ? "selected" : ""}} value="Seasonal">Seasonal</option>
                                            <option {{(auth()->user()->emp_stat_type == "Casual") ? "selected" : ""}} value="Casual">Casual</option>
                                            <option {{(auth()->user()->emp_stat_type == "Emergency") ? "selected" : ""}} value="Emergency">Emergency</option>
                                            <option {{(auth()->user()->emp_stat_type == "Job-order") ? "selected" : ""}} value="Job-order">Job-order</option>
                                        </select>
                                        @error('emp_stat_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="occupation" class="pt-2 pb-1"><b>Occupation</b></label>
                                        <select class="form-select @error('occupation') is-invalid @enderror" name="occupation" onchange="ifOther();" id="occupation" required>
                                            <option value="">Please select</option>  
                                            <option {{(auth()->user()->occupation == "None") ? "selected" : ""}} value="None">None</option>
                                            <option {{(auth()->user()->occupation == "Managers") ? "selected" : ""}} value="Managers">Managers</option>  
                                            <option {{(auth()->user()->occupation == "Professionals") ? "selected" : ""}} value="Professionals">Professionals</option>
                                            <option {{(auth()->user()->occupation == "Clerical Support Workers") ? "selected" : ""}} value="Clerical Support Workers">Clerical Support Workers</option>
                                            <option {{(auth()->user()->occupation == "Technician And Associate Professionals") ? "selected" : ""}} value="Technician And Associate Professionals">Technician And Associate Professionals</option>
                                            <option {{(auth()->user()->occupation == "Service and Sales Workers") ? "selected" : ""}} value="Service and Sales Workers">Service and Sales Workers</option>
                                            <option {{(auth()->user()->occupation == "Skilled Agricultural, Forestry and Fishery Workers") ? "selected" : ""}} value="Skilled Agricultural, Forestry and Fishery Workers">Skilled Agricultural, Forestry and Fishery Workers</option>
                                            <option {{(auth()->user()->occupation == "Craft and Related Trade Workers") ? "selected" : ""}} value="Craft and Related Trade Workers">Craft and Related Trade Workers</option>
                                            <option {{(auth()->user()->occupation == "Plant and Machine Operators and Assemblers") ? "selected" : ""}} value="Plant and Machine Operators and Assemblers">Plant and Machine Operators and Assemblers</option>
                                            <option {{(auth()->user()->occupation == "Elementary Occupations") ? "selected" : ""}} value="Elementary Occupations">Elementary Occupations</option>
                                            <option {{(auth()->user()->occupation == "Armed Forces Occupations") ? "selected" : ""}} value="Armed Forces Occupations">Armed Forces Occupations</option>
                                            <option {{(auth()->user()->occupation == "Other") ? "selected" : ""}} value="Other">Other, specify</option>
                                        </select>
                                </div>
                                <div id="if_other" style="{{(auth()->user()->occupation == "Other") ? "" : 'display:none;'}}">
                                <div class="col-md-12">
                                    <label for="other_occupation" class="pt-2 pb-1"><b>Other Occupation</b></label>
                                    <input id="other_occupation" name="other_occupation" value="{{auth()->user()->other_occupation}}" type="text" class="@error('other_occupation') is-invalid @enderror form-control" 
                                            placeholder="Enter other occupation">
                                </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-secondary text-white mt-3" type="submit"><i class="fa fa-floppy-disk" aria-hidden="true"></i> Save Info</button>
                            </div>
                        </div>

                    </div>


                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <div class="card-body box-profile">
                            <div class="row">
                                

                                <div class="col-md-6 col-12">
                                    <label for="org_affi" class="pt-2 pb-1"><b>Organization Affiliated (Optional)</b></label>
                                    <input id="org_affi" name="org_affi" value="{{auth()->user()->org_affi}}" type="text" class="@error('org_affi') is-invalid @enderror form-control" 
                                            placeholder="Enter Organization Affiliated">
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="cont_person" class="pt-2 pb-1"><b>Contact Person (Optional)</b></label>
                                    <input id="cont_person" name="cont_person" value="{{auth()->user()->cont_person}}" type="text" class="@error('cont_person') is-invalid @enderror form-control" 
                                            placeholder="Enter Contact Person">
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="office_address" class="pt-2 pb-1"><b>Office Address (Optional)</b></label>
                                    <input id="office_address" name="office_address" value="{{auth()->user()->office_address}}" type="text" class="@error('office_address') is-invalid @enderror form-control" 
                                            placeholder="Enter Office Address">
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="tel_no" class="pt-2 pb-1"><b>Tel. Nos. (Optional)</b></label>
                                    <input id="tel_no" name="tel_no" value="{{auth()->user()->tel_no}}" type="text" class="@error('tel_no') is-invalid @enderror form-control" 
                                            placeholder="Enter Tel. Nos.">
                                </div>


                                <div class="col-md-6 col-12">
                                    <label for="id_ref" class="pt-2 pb-1"><b>ID Reference</b></label>
                                    <div class="input-group">
                                        
                                        <select class="form-select" name="id_ref" id="inputGroupSelect01">
                                            <option value="">Please select</option>    
                                            <option {{(auth()->user()->id_ref == "N/A") ? "selected" : ""}} value="N/A">Not Available</option> 
                                            <option {{(auth()->user()->id_ref == "Passport ID") ? "selected" : ""}} value="Passport ID">Passport ID</option>
                                            <option {{(auth()->user()->id_ref == "Driver's License") ? "selected" : ""}} value="Driver's License">Driver's License</option>
                                            <option {{(auth()->user()->id_ref == "Company ID") ? "selected" : ""}} value="Company ID">Company ID</option>
                                            <option {{(auth()->user()->id_ref == "School ID") ? "selected" : ""}} value="School ID">School ID</option>
                                            <option {{(auth()->user()->id_ref == "Postal ID") ? "selected" : ""}} value="Postal ID">Postal ID</option>
                                            <option {{(auth()->user()->id_ref == "Unified Multi-Purpose ID") ? "selected" : ""}} value="Unified Multi-Purpose ID">Unified Multi-Purpose ID</option>
                                            <option {{(auth()->user()->id_ref == "Voter's ID") ? "selected" : ""}} value="Voter's ID">Voter's ID</option>
                                            <option {{(auth()->user()->id_ref == "PRC ID") ? "selected" : ""}} value="PRC ID">PRC ID</option>
                                            <option {{(auth()->user()->id_ref == "Birth Certificate") ? "selected" : ""}} value="Birth Certificate">Birth Certificate</option>
                                        </select>
                                        @error('id_ref')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="id_ref_no" class="pt-2 pb-1"><b>ID Reference No. (Optional)</b></label>
                                    <input id="id_ref_no" name="id_ref_no" value="{{auth()->user()->id_ref_no}}" type="text" class="@error('id_ref_no') is-invalid @enderror form-control" 
                                            placeholder="Enter ID Reference No. (Optional)">
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="sss_no" class="pt-2 pb-1"><b>SSS No. (Optional)</b></label>
                                    <input id="sss_no" name="sss_no" value="{{auth()->user()->sss_no}}" type="text" class="@error('sss_no') is-invalid @enderror form-control" 
                                            placeholder="Enter SSS No. (Optional)">
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="gis_no" class="pt-2 pb-1"><b>GIS No. (Optional)</b></label>
                                    <input id="gis_no" name="gis_no" value="{{auth()->user()->gis_no}}" type="text" class="@error('gis_no') is-invalid @enderror form-control" 
                                            placeholder="Enter GIS No. (Optional)">
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="pagibig" class="pt-2 pb-1"><b>Pag-Ibig No. (Optional)</b></label>
                                    <input id="pagibig" name="pagibig" value="{{auth()->user()->pagibig}}" type="text" class="@error('pagibig') is-invalid @enderror form-control" 
                                            placeholder="Enter Pag-Ibig No. (Optional)">
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="philhealth" class="pt-2 pb-1"><b>Philhealth No. (Optional)</b></label>
                                    <input id="philhealth" name="philhealth" value="{{auth()->user()->philhealth}}" type="text" class="@error('philhealth') is-invalid @enderror form-control" 
                                            placeholder="Enter Philhealth No. (Optional)">
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="f_lname" class="pt-2 pb-1"><b>Father's Last Name (Optional)</b></label>
                                    <input id="f_lname" name="f_lname" value="{{auth()->user()->f_lname}}" type="text" class="@error('f_lname') is-invalid @enderror form-control" 
                                            placeholder="Enter Father's Last Name (Optional)">
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="f_fname" class="pt-2 pb-1"><b>Father's First Name (Optional)</b></label>
                                    <input id="f_fname" name="f_fname" value="{{auth()->user()->f_fname}}" type="text" class="@error('f_fname') is-invalid @enderror form-control" 
                                            placeholder="Enter Father's First Name (Optional)">
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="f_mname" class="pt-2 pb-1"><b>Father's Middle Name (Optional)</b></label>
                                    <input id="f_mname" name="f_mname" value="{{auth()->user()->f_mname}}" type="text" class="@error('f_mname') is-invalid @enderror form-control" 
                                            placeholder="Enter Father's Middle Name (Optional)">
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="m_lname" class="pt-2 pb-1"><b>Mother's Last Name (Optional)</b></label>
                                    <input id="m_lname" name="m_lname" value="{{auth()->user()->m_lname}}" type="text" class="@error('m_lname') is-invalid @enderror form-control" 
                                            placeholder="Enter Mother's Last Name (Optional)">
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="m_fname" class="pt-2 pb-1"><b>Mother's First Name (Optional)</b></label>
                                    <input id="m_fname" name="m_fname" value="{{auth()->user()->m_fname}}" type="text" class="@error('m_fname') is-invalid @enderror form-control" 
                                            placeholder="Enter Mother's First Name (Optional)">
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="m_mname" class="pt-2 pb-1"><b>Mother's Middle Name (Optional)</b></label>
                                    <input id="m_mname" name="m_mname" value="{{auth()->user()->m_mname}}" type="text" class="@error('m_mname') is-invalid @enderror form-control" 
                                            placeholder="Enter Mother's Middle Name (Optional)">
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="g_lname" class="pt-2 pb-1"><b>Guardian's Last Name (Optional)</b></label>
                                    <input id="g_lname" name="g_lname" value="{{auth()->user()->g_lname}}" type="text" class="@error('g_lname') is-invalid @enderror form-control" 
                                            placeholder="Enter Guardian's Last Name (Optional)">
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="g_fname" class="pt-2 pb-1"><b>Guardian's First Name (Optional)</b></label>
                                    <input id="g_fname" name="g_fname" value="{{auth()->user()->g_fname}}" type="text" class="@error('g_fname') is-invalid @enderror form-control" 
                                            placeholder="Enter Guardian's First Name (Optional)">
                                </div>

                                <div class="col-md-4 col-12">
                                    <label for="g_mname" class="pt-2 pb-1"><b>Guardian's Middle Name (Optional)</b></label>
                                    <input id="g_mname" name="g_mname" value="{{auth()->user()->g_mname}}" type="text" class="@error('g_mname') is-invalid @enderror form-control" 
                                            placeholder="Enter Guardian's Middle Name (Optional)">
                                </div>

                            </div>
                            <div class="text-end">
                                <button class="btn btn-secondary text-white mt-3" type="submit"><i class="fa fa-floppy-disk" aria-hidden="true"></i> Save Info</button>
                            </div>
                        </div>

                    </div>

                </div>

                
            </div>
        </div> 
                
    </div>
</form>

</div>


@endsection
@push('scripts')
<script>
    function ifOther(){
        var selectedUser = document.getElementById("occupation").value;
        if(selectedUser == "Other"){
        document.getElementById("if_other").style.display = "block";
        document.getElementById("other_occupation").required;
        }else{
        document.getElementById("if_other").style.display = "none";
        document.getElementById("other_occupation").value = "";
        }
    }
</script>
@endpush