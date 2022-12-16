@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row mt-4 mb-1">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text"  onkeydown="return /[a-z, ]/i.test(event.key)" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-1">
                            <label for="middle_name" class="col-md-4 col-form-label text-md-end">{{ __('Middle Name (Optional)') }}</label>

                            <div class="col-md-6">
                                <input id="middle_name" type="text" onkeydown="return /[a-z, ]/i.test(event.key)" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name" autofocus>

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" onkeydown="return /[a-z, ]/i.test(event.key)" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="sufix" class="col-md-4 col-form-label text-md-end">Sufix </label>
                            <div class="col-md-6">
                                <select class="form-select" name="sufix" id="inputGroupSelect01" required>
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


                        <div class="form-group row mb-1">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">Gender </label>
                            <div class="col-md-6">
                                <select class="form-select" name="gender" id="inputGroupSelect01" required>
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

                        <div class="row mb-1">
                            <label for="civil_status" class="col-md-4 col-form-label text-md-end">Civil Status </label>
                            <div class="col-md-6">
                                <select class="form-select" name="civil_status" id="inputGroupSelect01" required>
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

                        <div class="form-group row mb-1">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-end">{{ __('Birth Date') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="religion" class="col-md-4 col-form-label text-md-end">{{ __('Religion') }}</label>

                            <div class="col-md-6">
                                <input id="religion" type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion') }}" required autocomplete="religion" autofocus>

                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="ethnic_group" class="col-md-4 col-form-label text-md-end">{{ __('Ethnic Group') }}</label>

                            <div class="col-md-6">
                                <input id="ethnic_group" type="text" class="form-control @error('ethnic_group') is-invalid @enderror" name="ethnic_group" value="{{ old('ethnic_group') }}" required autocomplete="ethnic_group" autofocus>

                                @error('ethnic_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="brgy" class="col-md-4 col-form-label text-md-end">Baranggay</label>
                            <div class="col-md-6">
                                <select class="form-select" name="brgy" id="inputGroupSelect01" required>
                                    <option value="">Please select</option>    
                                    <option value="Bagsangan">Bagsangan</option>
                                    <option value="Bacolod (Poblacion)">Bacolod (Poblacion)</option>
                                    <option value="Batang">Batang</option>
                                    <option value="Bolos">Bolos</option>
                                    <option value="Buenavista">Buenavista</option>
                                    <option value="Bulawan">Bulawan</option>
                                    <option value="Carriedo">Carriedo</option>
                                    <option value="Casini">Casini</option>
                                    <option value="Cawayan">Cawayan</option>
                                    <option value="Cogon">Cogon</option>
                                    <option value="Gabao">Gabao</option>
                                    <option value="Gulang-Gulang">Gulang-Gulang</option>
                                    <option value="Gumapia">Gumapia</option>
                                    <option value="Santo Domingo (Lamboon)">Santo Domingo (Lamboon)</option>
                                    <option value="Liang">Liang</option>
                                    <option value="Macawayan">Macawayan</option>
                                    <option value="Mapaso">Mapaso</option>
                                    <option value="Monbon">Monbon</option>
                                    <option value="Patag">Patag</option>
                                    <option value="Salvacion">Salvacion</option>
                                    <option value="San Agustin (Poblacion)">San Agustin (Poblacion)</option>
                                    <option value="San Isidro (Palogtok)">San Isidro (Palogtok)</option>
                                    <option value="San Juan (Poblacion)">San Juan (Poblacion)</option>
                                    <option value="San Julian (Poblacion)">San Julian (Poblacion)</option>
                                    <option value="San Pedro (Poblacion)">San Pedro (Poblacion)</option>
                                    <option value="Tabon-Tabon">Tabon-Tabon</option>
                                    <option value="Tinampo">Tinampo</option>
                                    <option value="Tongdol">Tongdol</option>
                                </select>
                            </div>
                            @error('brgy')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-1">
                            <label for="street" class="col-md-4 col-form-label text-md-end">{{ __('House No. / Street') }}</label>

                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street" autofocus>

                                @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="municipality" class="col-md-4 col-form-label text-md-end">{{ __('Municipality') }}</label>

                            <div class="col-md-6">
                                <input id="municipality" type="text" class="form-control @error('municipality') is-invalid @enderror" name="municipality" value="Irosin" required autocomplete="municipality" autofocus>

                                @error('municipality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="province" class="col-md-4 col-form-label text-md-end">{{ __('Province') }}</label>

                            <div class="col-md-6">
                                <input id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="Sorsogon" required autocomplete="province" autofocus>

                                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="region" class="col-md-4 col-form-label text-md-end">{{ __('Region') }}</label>

                            <div class="col-md-6">
                                <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="Region V" required autocomplete="region" autofocus>

                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" minlength="11" maxlength="11" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact" autofocus>

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="landline" class="col-md-4 col-form-label text-md-end">{{ __('Landline Number (Optional)') }}</label>

                            <div class="col-md-6">
                                <input id="landline" type="text" class="form-control @error('landline') is-invalid @enderror" name="landline" value="{{ old('landline') }}" required autocomplete="landline" autofocus>

                                @error('landline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="educ_attain" class="col-md-4 col-form-label text-md-end">Educational Attainment</label>
                            <div class="col-md-6">
                                <select class="form-select" name="educ_attain" id="inputGroupSelect01" required>
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

                        <div class="form-group row mb-1">
                            <label for="emp_stat" class="col-md-4 col-form-label text-md-end">Status of Employment</label>
                            <div class="col-md-6">
                                <select class="form-select" name="emp_stat" id="inputGroupSelect01" required>
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

                        <div class="form-group row mb-1">
                            <label for="emp_stat_cat" class="col-md-4 col-form-label text-md-end">Category of Employment</label>
                            <div class="col-md-6">
                                <select class="form-select" name="emp_stat_cat" id="inputGroupSelect01" required>
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

                        <div class="form-group row mb-1">
                            <label for="emp_stat_type" class="col-md-4 col-form-label text-md-end">Types of Employment</label>
                            <div class="col-md-6">
                                <select class="form-select" name="emp_stat_type" id="inputGroupSelect01" required>
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

                        <div class="form-group row mb-1">
                            <label for="occupation" class="col-md-4 col-form-label text-md-end">{{ __('Occupation (Optional)') }}</label>

                            <div class="col-md-6">
                                <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" autocomplete="occupation" autofocus>

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="blood_type" class="col-md-4 col-form-label text-md-end">Blood Type</label>
                            <div class="col-md-6">
                                <select class="form-select" name="blood_type" id="inputGroupSelect01" required>
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

                        <div class="form-group row mb-1">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-4 mt-4">
                            <div class="col-md-6 offset-md-4">
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
