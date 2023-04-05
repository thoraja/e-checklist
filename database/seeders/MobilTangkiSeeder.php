<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\MobilTangki;

class MobilTangkiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MobilTangki::insert([
            [
                'nomor_polisi' => 'X 1001 EX',
                'uraian' => 'Sebuah mobil tangki',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ],
            [
                'nomor_polisi' => 'X 2021 UX',
                'uraian' => 'Sebuah mobil tangki',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ],
            [
                'nomor_polisi' => 'X 3241 EX',
                'uraian' => 'Sebuah mobil tangki',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ],
        ]);
    }
}
