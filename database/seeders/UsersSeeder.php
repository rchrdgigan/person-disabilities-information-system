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
                'email'=>'admin@example.com',
                'birthdate'=> Now(),
                'birthplace'=>'San Juan Bag o',
                'civil_status'=>'Single',
                'citizenship'=>'Filipino',
                'brgy'=>'Barangay',
                'street'=>'Street',
                'purok'=>'Purok Uno',
                'contact'=>'093141412',
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
                'email'=>'user@example.com',
                'birthdate'=> Now(),
                'birthplace'=>'San Juan Bag o',
                'civil_status'=>'Single',
                'citizenship'=>'Filipino',
                'brgy'=>'Barangay',
                'street'=>'Street',
                'purok'=>'Purok Uno',
                'contact'=>'093141412',
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
