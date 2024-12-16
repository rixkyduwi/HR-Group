<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Prompts\Key;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'General Manager',
                'email' => 'gm@gmail.com',
                'role' => 'gm',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Manager HRD',
                'email' => 'mh@gmail.com',
                'role' => 'mh',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Manager Legal',
                'email' => 'ml@gmail.com',
                'role' => 'ml',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Manager Produksi',
                'email' => 'mp@gmail.com',
                'role' => 'mp',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Manager Keuangan',
                'email' => 'mk@gmail.com',
                'role' => 'mk',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Manager Marketing',
                'email' => 'mm@gmail.com',
                'role' => 'mm',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Marketing',
                'email' => 'marketing@gmail.com',
                'role' => 'marketing',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'HRD',
                'email' => 'hrd@gmail.com',
                'role' => 'hrd',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Legal',
                'email' => 'legal@gmail.com',
                'role' => 'legal',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Produksi',
                'email' => 'produksi@gmail.com',
                'role' => 'produksi',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Keuangan',
                'email' => 'keuangan@gmail.com',
                'role' => 'keuangan',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Direktur',
                'email' => 'direktur@gmail.com',
                'role' => 'direktur',
                'password' => bcrypt('admin'),
            ],
        ];
        foreach ($userdata as $key => $val) {
            User::create($val);
        }
    }
}
