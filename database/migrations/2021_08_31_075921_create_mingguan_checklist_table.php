<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMingguanChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mingguan_checklist', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mobil_tangki_id');
            $table->date('tanggal');
            $table->unsignedInteger('km_odo');
            $table->string('nama_amt');
            $table->string('nama_mekanik');
            $table->string('nama_pengawas_operasi')->nullable(); //TEMP:tipe data
            $table->string('qnq')->nullable(); //TEMP:tipe data
            $table->timestamps();

            $table->foreign('mobil_tangki_id')->references('id')->on('mobil_tangki');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mingguan_checklist');
    }
}
