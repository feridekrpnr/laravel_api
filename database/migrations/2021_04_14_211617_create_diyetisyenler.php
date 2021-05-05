<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiyetisyenler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diyetisyenler', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('kullanici_id')->unsigned();
            $table->text('hakkimda',350)->nullable();
            $table->double('puan',30)->nullable();
            $table->foreign('kullanici_id')->references('id')->on('kullanicilar');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diyetisyenler');
    }
}
