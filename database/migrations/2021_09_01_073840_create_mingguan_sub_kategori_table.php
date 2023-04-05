<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMingguanSubKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mingguan_sub_kategori', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nama');
            $table->boolean('is_krusial');
            $table->unsignedSmallInteger('mingguan_kategori_id');

            $table->foreign('mingguan_kategori_id')->references('id')->on('mingguan_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mingguan_sub_kategori');
    }
}
