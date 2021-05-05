<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBesinler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('besinler', function (Blueprint $table) {

            $table->id();
            $table->string('besin_adi',70);
            $table->integer('besin_kalori');
            $table->string('besin_birimi',30);
            $table->unsignedBigInteger('besin_kategori_id');
            $table->foreign('besin_kategori_id')->references('id')->on('besin_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('besinler');
    }
}
