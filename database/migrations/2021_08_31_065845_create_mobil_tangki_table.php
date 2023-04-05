<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilTangkiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobil_tangki', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_polisi', 16)->unique();
            $table->string('password');

            $table->string('uraian')->nullable(); //TEMP:menyesuaikan kolom-kolom sesuai yang dibutuhkan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobil_tangki');
    }
}
