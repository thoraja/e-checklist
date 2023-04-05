<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulananSubKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulanan_sub_kategori', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nama');
            $table->unsignedSmallInteger('bulanan_kategori_id');

            $table->foreign('bulanan_kategori_id')->references('id')->on('bulanan_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulanan_sub_kategori');
    }
}
