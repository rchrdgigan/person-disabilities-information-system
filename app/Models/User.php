<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $appends = ['fullname'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'sufix',
        'gender',
        'religion',
        'ethnic_group',
        'email',
        'birthdate',
        'civil_status',
        'barangay_id',
        'street',
        'municipality',
        'province',
        'region',
        'contact',
        'landline',
        'educ_attain',
        'emp_stat',
        'emp_stat_cat',
        'emp_stat_type',
        'occupation',
        'other_occupation',
        'blood_type',
        'org_affi',
        'cont_person',
        'office_address',
        'tel_no',
        'id_num',
        'id_ref',
        'sss_no',
        'gis_no',
        'pagibig',
        'philhealth',
        'f_lname',
        'f_fname',
        'f_mname',
        'm_lname',
        'm_fname',
        'm_mname',
        'g_lname',
        'g_fname',
        'g_mname',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["user", "admin"][$value],
        );
    }

    public function barangay(){
        return $this->belongsTo(Barangay::class);
    }
    
    public function getFullNameAttribute()
    {
        return "{$this['first_name']} {$this['middle_name']} {$this['last_name']}";
    }
}
