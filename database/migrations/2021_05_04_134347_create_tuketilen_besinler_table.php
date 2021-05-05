<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuketilenBesinlerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuketilen_besinler', function (Blueprint $table) {

            $table->id();
            $table->date('tarih');
            $table->unsignedBigInteger('ogun_id');
            //$table->foreign('ogun_id')->references('id')->on('ogunler');
            $table->unsignedBigInteger('danisan_id');
            $table->foreign('danisan_id')->references('id')->on('danisanlar');
            $table->unsignedBigInteger('besin_id');
            //$table->foreign('besin_id')->references('id')->on('besinler');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tuketilen_besinler');
    }
}
