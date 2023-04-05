<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = [
        'users',
        'roles',
        'harian_kategori',
        'mingguan_kategori',
        'mingguan_sub_kategori',
        'bulanan_kategori',
        'bulanan_sub_kategori',
        'harian_poin',
        'mingguan_poin',
        'bulanan_poin',
        'bulanan_jenis_pengecekan',
        'bulanan_poin_jenis_pengecekan'
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Truncating tables...');
        Model::unguard();

        Schema::disableForeignKeyConstraints();

        foreach($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }

        Schema::enableForeignKeyConstraints();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            KategoriSeeder::class,
            PoinSeeder::class,
            JenisPengecekanSeeder::class,
        ]);

        Model::reguard();
    }
}
