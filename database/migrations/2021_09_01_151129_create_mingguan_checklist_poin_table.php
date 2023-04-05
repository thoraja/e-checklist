<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMingguanChecklistPoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mingguan_checklist_poin', function (Blueprint $table) {
          $table->unsignedInteger('mingguan_checklist_id');
          $table->unsignedSmallInteger('mingguan_poin_id');
          $table->boolean('kondisi');
          $table->string('keterangan')->nullable();
          $table->string('bukti')->nullable();
          $table->timestamps();

          $table->foreign('mingguan_checklist_id')->references('id')->on('mingguan_checklist');
          $table->foreign('mingguan_poin_id')->references('id')->on('mingguan_poin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mingguan_checklist_poin');
    }
}
