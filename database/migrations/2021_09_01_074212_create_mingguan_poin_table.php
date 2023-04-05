<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMingguanPoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mingguan_poin', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('deskripsi');
            $table->boolean('is_krusial');
            $table->unsignedSmallInteger('mingguan_sub_kategori_id');

            $table->foreign('mingguan_sub_kategori_id')->references('id')->on('mingguan_sub_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mingguan_poin');
    }
}
