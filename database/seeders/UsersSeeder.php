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
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                'type' => 1,
                'password' => Hash::make('admin12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
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
