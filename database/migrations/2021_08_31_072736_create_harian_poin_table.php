<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarianPoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harian_poin', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('deskripsi');
            $table->unsignedSmallInteger('harian_kategori_id');

            $table->foreign('harian_kategori_id')->references('id')->on('harian_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harian_poin');
    }
}
