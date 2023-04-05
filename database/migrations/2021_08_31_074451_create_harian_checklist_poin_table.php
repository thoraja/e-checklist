<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarianChecklistPoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harian_checklist_poin', function (Blueprint $table) {
            $table->unsignedBigInteger('harian_checklist_id');
            $table->unsignedSmallInteger('harian_poin_id');
            $table->unsignedInteger('kondisi');
            $table->string('bukti')->nullable();
            $table->timestamps();

            $table->foreign('harian_checklist_id')->references('id')->on('harian_checklist');
            $table->foreign('harian_poin_id')->references('id')->on('harian_poin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harian_checklist_poin');
    }
}
