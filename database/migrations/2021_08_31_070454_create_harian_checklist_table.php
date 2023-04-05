<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarianChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harian_checklist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('mobil_tangki_id');
            $table->date('tanggal');
            $table->tinyInteger('rit');
            $table->string('catatan');
            $table->string('nama_amt')->nullable();
            $table->unsignedInteger('pengawas_amt_id')->nullable();
            $table->unsignedInteger('hsse_id')->nullable();
            $table->timestamps();

            $table->foreign('mobil_tangki_id')->references('id')->on('mobil_tangki');
            $table->foreign('pengawas_amt_id')->references('id')->on('users');
            $table->foreign('hsse_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harian_checklist');
    }
}
