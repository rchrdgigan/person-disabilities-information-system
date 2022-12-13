<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date', 'max:255'],
            'birthplace' => ['required', 'string', 'max:255'],
            'civil_status' => ['required', 'string', 'max:255'],
            'citizenship' => ['required', 'string', 'max:255'],
            'brgy' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'purok' => ['required', 'string', 'max:255'],
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image'         => 'nullable|image|file|max:5000',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if($data['image'])
        {
            $filenameWithExt = $data['image']->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $data['image']->getClientOriginalExtension();
            $file_image = $filename.'_'.time().'.'.$extension;
            $path = $data['image']->move('public/users_image/',$file_image);
        }
        else
        {
            $file_image = 'noimage.png';
        }
        return User::create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'birthdate' => $data['birthdate'],
            'birthplace' => $data['birthplace'],
            'civil_status' => $data['civil_status'],
            'citizenship' => $data['citizenship'],
            'brgy' => $data['brgy'],
            'street' => $data['street'],
            'purok' => $data['purok'],
            'contact' => $data['contact'],
            'image' => $file_image,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
