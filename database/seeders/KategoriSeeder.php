<?php

namespace Database\Seeders;

use App\Models\ChecklistModels\Harian\Kategori as HarianKategori;
use App\Models\ChecklistModels\Mingguan\Kategori as MingguanKategori;
use App\Models\ChecklistModels\Mingguan\SubKategori as MingguanSubKategori;
use App\Models\ChecklistModels\Bulanan\Kategori as BulananKategori;
use App\Models\ChecklistModels\Bulanan\SubKategori as BulananSubKategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HarianKategori::insert([
            ["nama" => "Perlengkapan Mobil Tangki"],
            ["nama" => "Perlengkapan AMT"],
            ["nama" => "ODO Meter"],
        ]);
        MingguanKategori::insert([
            ["nama" => "Uji Coba Rem", "is_krusial" => 1],
            ["nama" => "Lampu-Lampu", "is_krusial" => 0],
            ["nama" => "Ban Sisi Penumpang (Kiri)", "is_krusial" => 0],
            ["nama" => "Ban Sisi Pengemudi (Kanan)", "is_krusial" => 0],
            ["nama" => "Marking & Plakarding", "is_krusial" => 0],
            ["nama" => "Kebocoran & Kecukupukan Pelumas", "is_krusial" => 1],
            ["nama" => "Sistem Pendinginan", "is_krusial" => 1],
            ["nama" => "Dalam Kabin", "is_krusial" => 0],
            ["nama" => "Sistem Gas Buang (Warna Asap)", "is_krusial" => 1],
            ["nama" => "Power Steering", "is_krusial" => 0],
            ["nama" => "Tangki Solar (Own Use)", "is_krusial" => 0],
            ["nama" => "Accu", "is_krusial" => 0],
            ["nama" => "Bracket Kaca Spion", "is_krusial" => 0],
            ["nama" => "Karet Wiper", "is_krusial" => 0],
            ["nama" => "Pijakan Pintu Kabin", "is_krusial" => 0],
            ["nama" => "APAR", "is_krusial" => 0],
            ["nama" => "Kaca Depan", "is_krusial" => 0],
            ["nama" => "Pneumatic", "is_krusial" => 1],
            ["nama" => "Box Bottom Loading", "is_krusial" => 0],
            ["nama" => "Box Pneumatic (Interlock)", "is_krusial" => 0],
            ["nama" => "Selang Loosing", "is_krusial" => 0],
            ["nama" => "Kabel Arde", "is_krusial" => 0],
            ["nama" => "Perlengkapan", "is_krusial" => 0],
            ["nama" => "Pengikat Tidak Standart", "is_krusial" => 0],
            ["nama" => "IJT Bout", "is_krusial" => 0],
            ["nama" => "Main Hole", "is_krusial" => 0],
            ["nama" => "Segel Nominal", "is_krusial" => 0],
        ]);
        MingguanSubKategori::insert([
            ["nama" => "Fungsi Rem Kanan", "is_krusial" => 0, "mingguan_kategori_id" => 1],
            ["nama" => "Fungsi Rem Kiri", "is_krusial" => 0, "mingguan_kategori_id" => 1],
            ["nama" => "Lampu Depan – Lampu Besar", "is_krusial" => 0, "mingguan_kategori_id" => 2],
            ["nama" => "Lampu Depan – Lampu Kota", "is_krusial" => 0, "mingguan_kategori_id" => 2],
            ["nama" => "Lampu Depan – Lampu Sign", "is_krusial" => 1, "mingguan_kategori_id" => 2],
            ["nama" => "Lampu Depan – Lampu Rotari", "is_krusial" => 0, "mingguan_kategori_id" => 2],
            ["nama" => "Lampu Belakang – Lampu Kota", "is_krusial" => 0, "mingguan_kategori_id" => 2],
            ["nama" => "Lampu Belakang – Lampu Sign", "is_krusial" => 1, "mingguan_kategori_id" => 2],
            ["nama" => "Lampu Belakang – Lampu Rem", "is_krusial" => 1, "mingguan_kategori_id" => 2],
            ["nama" => "Lampu Belakang – Lampu Mundur", "is_krusial" => 0, "mingguan_kategori_id" => 2],
            ["nama" => "Lampu Samping – Lampu Kota", "is_krusial" => 0, "mingguan_kategori_id" => 2],
            ["nama" => "Lampu Samping – Lampu Sign", "is_krusial" => 0, "mingguan_kategori_id" => 2],
            ["nama" => "Kondisi Ban", "is_krusial" => 1, "mingguan_kategori_id" => 3],
            ["nama" => "Mur dan Baut Roda", "is_krusial" => 1, "mingguan_kategori_id" => 3],
            ["nama" => "Kondisi Ban", "is_krusial" => 1, "mingguan_kategori_id" => 4],
            ["nama" => "Mur dan Baut Roda", "is_krusial" => 1, "mingguan_kategori_id" => 4],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 5],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 6],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 7],
            ["nama" => "Kondisi Kontak 'Off'", "is_krusial" => 0, "mingguan_kategori_id" => 8],
            ["nama" => "Kondisi Kontak 'On'", "is_krusial" => 0, "mingguan_kategori_id" => 8],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 9],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 10],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 11],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 12],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 13],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 14],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 15],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 16],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 17],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 18],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 19],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 20],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 21],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 22],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 23],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 24],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 25],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 26],
            ["nama" => "General", "is_krusial" => 0, "mingguan_kategori_id" => 27],
        ]);
        BulananKategori::insert([
            ["nama" => "Kabin"],
            ["nama" => "Bagian Luar Kendaraan"],
            ["nama" => "Mesin"],
            ["nama" => "Bagian Bawah Kendaraan"],
            ["nama" => "Trailer Chassis"],
            ["nama" => "Tank & Fitting "],
            ["nama" => "Final Check"],
        ]);
        BulananSubKategori::insert([
            ["nama" => "General", "bulanan_kategori_id" => 1],
            ["nama" => "Fungsi kelistrikan", "bulanan_kategori_id" => 1],
            ["nama" => "General", "bulanan_kategori_id" => 2],
            ["nama" => "Pendingin mesin", "bulanan_kategori_id" => 3],
            ["nama" => "Sitem bahan bakar", "bulanan_kategori_id" => 3],
            ["nama" => "Sitem pelumas", "bulanan_kategori_id" => 3],
            ["nama" => "Steering", "bulanan_kategori_id" => 3],
            ["nama" => "General", "bulanan_kategori_id" => 4],
            ["nama" => "Suspensi depan", "bulanan_kategori_id" => 4],
            ["nama" => "Drive line", "bulanan_kategori_id" => 4],
            ["nama" => "Suspensi belakang", "bulanan_kategori_id" => 4],
            ["nama" => "Rem", "bulanan_kategori_id" => 4],
            ["nama" => "General", "bulanan_kategori_id" => 5],
            ["nama" => "Suspensi belakang", "bulanan_kategori_id" => 5],
            ["nama" => "Rem", "bulanan_kategori_id" => 5],
            ["nama" => "General", "bulanan_kategori_id" => 6],
            ["nama" => "General", "bulanan_kategori_id" => 7],
        ]);
    }
}
