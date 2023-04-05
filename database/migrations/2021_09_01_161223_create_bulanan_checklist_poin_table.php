<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateBulananChecklistPoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulanan_checklist_poin', function (Blueprint $table) {
            $table->unsignedInteger('bulanan_checklist_id');
            $table->unsignedSmallInteger('bulanan_poin_id');
            $table->boolean('hasil'); // TEMP:isinya
            $table->unsignedTinyInteger('bulanan_pengecekan_id')->nullable();
            $table->char('criticality', 1)->nullable();
            $table->string('detail_perbaikan')->nullable();
            $table->date('waktu_rencana_perbaikan')->nullable(); //TEMP:apakah tanggal atau waktu?
            $table->date('pemesanan_part')->nullable(); //TEMP: apakah tanggal?
            $table->string('bukti')->nullable();
            $table->timestamps();

            $table->foreign('bulanan_checklist_id')->references('id')->on('bulanan_checklist');
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
        Schema::dropIfExists('bulanan_checklist_poin');
    }
}
