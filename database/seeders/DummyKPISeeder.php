<?php

namespace Database\Seeders;

use App\Models\Kpi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyKPISeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
                'user_id' => '9',
                'Jabatan_id' => '1',
                'name' => 'HRD',
                'desc' => 'TEST DESCRIPTION',
                'bobot' => '20',
                'target' => '100',
                'realisasi' => '100', 
                'skor' => '20', 
                'final_skor' => '20', 
            ]
        ];
        foreach ($userdata as $key => $val) {
            Kpi::create($val);
        }
    }
}
