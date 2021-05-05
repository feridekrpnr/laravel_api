<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRandevular extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('randevular', function (Blueprint $table) {

            $table->id();
            $table->date('randevu_tarih');
            $table->time('randevu_saat');

            $table->unsignedBigInteger('danisan_id');
            $table->unsignedBigInteger('diyetisyen_id');

            $table->foreign('danisan_id')->references('id')->on('danisanlar');
            $table->foreign('diyetisyen_id')->references('id')->on('diyetisyenler');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('randevular');
    }
}
