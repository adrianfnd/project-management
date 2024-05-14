<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SbusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sbus = [
            'SBU Palembang' => 'Palembang',
            'SBU Denpasar' => 'Denpasar',
            'SBU Medan' => 'Medan',
            'SBU Pekanbaru' => 'Pekanbaru',
            'SBU Makasar' => 'Makasar',
            'SBU Surabaya' => 'Surabaya',
            'SBU Bandung' => 'Bandung',
            'SBU Balikpapan' => 'Balikpapan',
            'SBU Jakban' => 'Jakarta Barat',
            'SBU Semarang' => 'Semarang',
        ];

        foreach ($sbus as $sbu => $location) {
            DB::table('sbus')->insert([
                'sbu_name' => $sbu,
                'location' => $location,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
