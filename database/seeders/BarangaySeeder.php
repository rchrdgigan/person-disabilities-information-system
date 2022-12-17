<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barangays = [
            'Bagsangan',
            'Bacolod (Poblacion)',
            'Batang',
            'Bolos',
            'Buenavista',
            'Bulawan',
            'Carriedo',
            'Casini',
            'Cawayan',
            'Cogon',
            'Gabao',
            'Gulang-Gulang',
            'Gumapia',
            'Santo Domingo (Lamboon)',
            'Liang',
            'Macawayan',
            'Mapaso',
            'Monbon',
            'Patag',
            'Salvacion',
            'San Agustin (Poblacion)',
            'San Isidro (Palogtok)',
            'San Juan (Poblacion)',
            'San Julian (Poblacion)',
            'San Pedro (Poblacion)',
            'Tabon-Tabon',
            'Tinampo',
            'Tongdol',
        ];

        foreach ($barangays as $barangay) {
            DB::table('barangays')->insert([
                'brgy' => $barangay,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
