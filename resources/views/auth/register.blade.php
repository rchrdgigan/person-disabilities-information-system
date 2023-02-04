@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white"><b>{{ __('Register Form') }}</b></label></div>

                <div class="card-body m-3">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="first_name"><b>{{ __('First Name') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="first_name" type="text"  onkeydown="return /[a-z, ]/i.test(event.key)" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="middle_name"><b>{{ __('Middle Name (Optional)') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="middle_name" type="text" onkeydown="return /[a-z, ]/i.test(event.key)" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name" autofocus>

                                        @error('middle_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="last_name"><b>{{ __('Last Name') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="last_name" type="text" onkeydown="return /[a-z, ]/i.test(event.key)" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="sufix"><b>{{ __('Sufix') }}</b></label>
                                    <div class="col-md-12">
                                        <select class="form-select @error('sufix') is-invalid @enderror" name="sufix" id="sufix">
                                            @if(old('sufix'))
                                                <option selected value="{{old('sufix')}}">{{old('sufix')}}</option> 
                                            @endif
                                            <option value="">Please select</option>
                                            <option value="N/A">Not Applicable</option>
                                            <option value="Jr.">Jr.</option>
                                            <option value="Jr.">Sr.</option>
                                            <option value="I">I</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                            <option value="V">V</option>
                                            <option value="VI">VI</option>
                                            <option value="VII">VII</option>
                                            <option value="VIII">VIII</option>
                                            <option value="IX">IX</option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                            <option value="XIII">XIII</option>
                                            <option value="XIV">XIV</option>
                                            <option value="XV">XV</option>
                                            <option value="XVI">XVI</option>
                                            <option value="XVII">XVII</option>
                                            <option value="XVIII">XVIII</option>
                                            <option value="XIX">XIX</option>
                                            <option value="XX">XX</option>
                                            <option value="XXI">XXI</option>
                                            <option value="XXI">XXII</option>
                                            <option value="XXI">XXIII</option>
                                            <option value="XXI">XXIV</option>
                                            <option value="XXI">XXV</option>
                                            <option value="XXI">XXVI</option>
                                            <option value="XXI">XXVII</option>
                                            <option value="XXI">XXVIII</option>
                                        </select>
                                    </div>
                                    @error('sufix')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group mb-2">
                                    <label for="gender"><b>{{ __('Gender') }}</b></label>
                                    <div class="col-md-12">
                                        <select class="form-select @error('gender') is-invalid @enderror" name="gender" id="gender">
                                            @if(old('gender'))
                                                <option selected value="{{old('gender')}}">{{old('gender')}}</option> 
                                            @endif
                                            <option value="">Please select</option>    
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="civil_status"><b>{{ __('Civil Status') }}</b></label>
                                    <div class="col-md-12">
                                        <select class="form-select @error('civil_status') is-invalid @enderror" name="civil_status" id="civil_status">
                                            @if(old('civil_status'))
                                            <option selected value="{{old('civil_status')}}">{{old('civil_status')}}</option> 
                                            @endif
                                            <option value="">Please select</option>  
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Separated</option>
                                            <option value="Widowed">Widow/er</option>
                                            <option value="Cohabitation">Co-Habitation (live-in)</option>
                                        </select>
                                    </div>
                                    @error('civil_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong> 
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="birthdate"><b>{{ __('Birth Date') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>

                                        @error('birthdate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="religion"><b>{{ __('Religion') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="religion" type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion') }}" required autocomplete="religion" autofocus>

                                        @error('religion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="ethnic_group"><b>{{ __('Ethnic Group') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="ethnic_group" type="text" class="form-control @error('ethnic_group') is-invalid @enderror" name="ethnic_group" value="{{ old('ethnic_group') }}" required autocomplete="ethnic_group" autofocus>

                                        @error('ethnic_group')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="brgy_id"><b>{{ __('Baranggay') }}</b></label>
                                    <div class="col-md-12">
                                        <select class="form-select" name="brgy_id" id="brgy_id" required>
                                            <option value="">Please select</option>  
                                            @foreach($brgy as $data)  
                                            <option {{( old('brgy_id') == $data->id ) ? 'selected':''}} value="{{$data->id}}">{{$data->brgy}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('brgy_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="street"><b>{{ __('House No. / Street') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street" autofocus>

                                        @error('street')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="municipality"><b>{{ __('Municipality') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="municipality" type="text" class="form-control @error('municipality') is-invalid @enderror" name="municipality" value="Irosin" required autocomplete="municipality" autofocus>

                                        @error('municipality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="province"><b>{{ __('Province') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="Sorsogon" required autocomplete="province" autofocus>

                                        @error('province')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="region"><b>{{ __('Region') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="Region V" required autofocus>

                                        @error('region')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="contact"><b>{{ __('Contact Number') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="contact" type="text" minlength="11" maxlength="11" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact" autofocus>

                                        @error('contact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="landline"><b>{{ __('Landline Number (Optional)') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="landline" type="text" class="form-control @error('landline') is-invalid @enderror" name="landline" value="{{ old('landline') }}" autocomplete="landline" autofocus>

                                        @error('landline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="educ_attain"><b>{{ __('Educational Attainment') }}</b></label>
                                    <div class="col-md-12">
                                        <select class="form-select @error('educ_attain') is-invalid @enderror" name="educ_attain" id="educ_attain" required>
                                            @if(old('educ_attain'))
                                                <option selected value="{{old('educ_attain')}}">{{old('educ_attain')}}</option> 
                                            @endif
                                            <option value="">Please select</option>    
                                            <option value="None">None</option>
                                            <option value="Elementary Education">Elementary Education</option>
                                            <option value="High School Education">High School Education</option>
                                            <option value="College">College</option>
                                            <option value="Postgraduate Program">Postgraduate Program</option>
                                            <option value="Non-Formal Education">Non-Formal Education</option>
                                            <option value="Vocational">Vocational</option>
                                        </select>
                                    </div>
                                    @error('educ_attain')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="emp_stat"><b>{{ __('Status of Employment') }}</b></label>
                                    <div class="col-md-12">
                                        <select class="form-select @error('emp_stat') is-invalid @enderror" name="emp_stat" id="emp_stat" required>
                                            @if(old('emp_stat'))
                                                <option selected value="{{old('emp_stat')}}">{{old('emp_stat')}}</option> 
                                            @endif
                                            <option value="">Please select</option>    
                                            <option value="None">None</option>
                                            <option value="Employed">Employed</option>
                                            <option value="Self-employed">Self-employed</option>
                                            <option value="Unemployed">Unemployed</option>
                                        </select>
                                    </div>
                                    @error('emp_stat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="emp_stat_cat"><b>{{ __('Category of Employment') }}</b></label>
                                    <div class="col-md-12">
                                        <select class="form-select @error('emp_stat_cat') is-invalid @enderror" name="emp_stat_cat" id="emp_stat_cat" required>
                                            @if(old('emp_stat_cat'))
                                                <option selected value="{{old('emp_stat_cat')}}">{{old('emp_stat_cat')}}</option> 
                                            @endif
                                            <option value="">Please select</option>    
                                            <option value="None">None</option>
                                            <option value="Government">Government</option>
                                            <option value="Private">Private</option>
                                        </select>
                                    </div>
                                    @error('emp_stat_cat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="emp_stat_type"><b>{{ __('Types of Employment') }}</b></label>
                                    <div class="col-md-12">
                                        <select class="form-select @error('emp_stat_type') is-invalid @enderror" name="emp_stat_type" id="emp_stat_type" required>
                                            @if(old('emp_stat_type'))
                                                <option selected value="{{old('emp_stat_type')}}">{{old('emp_stat_type')}}</option> 
                                            @endif
                                            <option value="">Please select</option>  
                                            <option value="None">None</option>  
                                            <option value="Permanent/Regular">Permanent/Regular</option>
                                            <option value="Seasonal">Seasonal</option>
                                            <option value="Casual">Casual</option>
                                            <option value="Emergency">Emergency</option>
                                        </select>
                                    </div>
                                    @error('emp_stat_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="occupation"><b>{{ __('Occupation (Optional)') }}</b></label>

                                    <div class="col-md-12">
                                        <select class="form-select @error('occupation') is-invalid @enderror" name="occupation" id="occupation" required>
                                            @if(old('occupation'))
                                                <option selected value="{{old('occupation')}}">{{old('occupation')}}</option> 
                                            @endif
                                            <option value="">Please select</option>  
                                            <option value="Managers">Managers</option>  
                                            <option value="Professionals">Professionals</option>
                                            <option value="Technician And Associate Professionals">Technician And Associate Professionals</option>
                                            <option value="Service and Sales Workers">Service and Sales Workers</option>
                                            <option value="Skilled Agricultural, Forestry and Fishery Workers">Skilled Agricultural, Forestry and Fishery Workers</option>
                                            <option value="Craft and Related Trade Workers">Craft and Related Trade Workers</option>
                                            <option value="Plant and Machine Operators and Assemblers">Plant and Machine Operators and Assemblers</option>
                                            <option value="Elementary Occupations">Elementary Occupations</option>
                                            <option value="Armed Forces Occupations">Armed Forces Occupations</option>
                                            <option value="Other">Other, specify</option>
                                        </select>
                                        @error('occupation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="other_occupation"><b>{{ __('Other Occupation') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="other_occupation" type="text" class="form-control @error('other_occupation') is-invalid @enderror" name="other_occupation" value="{{ old('other_occupation') }}" required autocomplete="other_occupation" autofocus>

                                        @error('other_occupation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="blood_type"><b>{{ __('Blood Type') }}</b></label>
                                    <div class="col-md-12">
                                        <select class="form-select" name="blood_type" id="blood_type" required>
                                            @if(old('blood_type'))
                                                <option selected value="{{old('blood_type')}}">{{old('blood_type')}}</option> 
                                            @endif
                                            <option value="">Please select</option>
                                            <option value="N/A">Not Available</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                    @error('blood_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="email"><b>{{ __('E-Mail Address') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="password"><b>{{ __('Password') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="password-confirm"><b>{{ __('Confirm Password') }}</b></label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-10">
                                <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
