<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
                'user_id' => '9',
                'name' => 'HRD',
                'desc' => 'TEST DESCRIPTION',
                'bobot' => '20',
            ]
        ];
        foreach ($userdata as $key => $val) {
            Jabatan::create($val);
        }
    }
}
