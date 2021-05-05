<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuketilenBesinlerKaloriHesaplamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuketilen_besinler_kalori_hesaplama', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tuketilen_besin_id');
            $table->unsignedBigInteger('kalori_hesaplama_id');
            $table->foreign('tuketilen_besin_id')->references('id')->on('tuketilen_besinler');
            $table->foreign('kalori_hesaplama_id')->references('id')->on('kalori_hesaplama');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tuketilen_besinler_kalori_hesaplama');
    }
}
