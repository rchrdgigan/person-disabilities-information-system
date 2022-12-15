<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name'=>'Admin',
                'middle_name'=>'Admin',
                'last_name'=>'Admin',
                'gender'=>'Male',
                'religion'=>'Catholic',
                'ethnic_group'=>'Sample',
                'email'=>'admin@example.com',
                'birthdate'=> Now(),
                'civil_status'=>'Single',
                'brgy'=>'Barangay',
                'street'=>'Street',
                'municipality'=>'Irosin',
                'region'=>'Region V',
                'province'=>'Sorsogon',
                'contact'=>'093141412',
                'educ_attain'=>'Sample',
                'type' => 1,
                'password' => Hash::make('admin12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name'=>'User',
                'middle_name'=>'User',
                'last_name'=>'User',
                'gender'=>'Male',
                'religion'=>'Catholic',
                'ethnic_group'=>'Sample',
                'email'=>'user@example.com',
                'birthdate'=> Now(),
                'civil_status'=>'Single',
                'brgy'=>'Barangay',
                'street'=>'Street',
                'municipality'=>'Irosin',
                'province'=>'Sorsogon',
                'region'=>'Region V',
                'contact'=>'093141412',
                'educ_attain'=>'Sample',
                'type' => 0,
                'password' => Hash::make('user12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($users as $key => $user) {
            // create initial user
            DB::table('users')->insert($user);
        }
    }   
}
