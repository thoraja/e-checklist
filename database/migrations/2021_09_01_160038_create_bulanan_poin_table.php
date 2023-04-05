<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulananPoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulanan_poin', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('deskripsi');
            $table->unsignedSmallInteger('bulanan_sub_kategori_id');

            $table->foreign('bulanan_sub_kategori_id')->references('id')->on('bulanan_sub_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulanan_poin');
    }
}
