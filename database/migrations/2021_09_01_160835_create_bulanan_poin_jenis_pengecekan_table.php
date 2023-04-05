<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulananPoinJenisPengecekanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulanan_poin_jenis_pengecekan', function (Blueprint $table) {
            $table->unsignedSmallInteger('bulanan_poin_id');
            $table->unsignedTinyInteger('bulanan_pengecekan_id');

            $table->foreign('bulanan_poin_id')->references('id')->on('bulanan_poin');
            $table->foreign('bulanan_pengecekan_id')->references('id')->on('bulanan_jenis_pengecekan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulanan_poin_jenis_pengecekan');
    }
}
