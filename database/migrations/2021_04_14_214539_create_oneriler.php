<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneriler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oneriler', function (Blueprint $table) {
            $table->id();
            $table->dateTime('oneri_tarih');
            $table->text('oneri_aciklama');
            $table->integer('oneri_kalori');

            $table->unsignedBigInteger('besin_id');
            $table->unsignedBigInteger('danisan_id');
            $table->unsignedBigInteger('diyetisyen_id');
            $table->foreign('diyetisyen_id')->references('id')->on('diyetisyenler');

            /*
            $table->foreign('besin_id')->references('id')->on('besin_kategori');
            $table->foreign('danisan_id')->references('id')->on('danisanlar');

            //$table->foreign('ogun_id')->references('id')->on('ogunler');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oneriler');
    }
}
