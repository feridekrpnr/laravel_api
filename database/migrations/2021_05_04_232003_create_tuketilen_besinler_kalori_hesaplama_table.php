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
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('tuketilen_besin_id');
            $table->unsignedBigInteger('kalori_hesaplama_id');
            $table->foreign('tuketilen_besin_id')->references('id')->on('tuketilen_besinler')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('kalori_hesaplama_id')->references('id')->on('kalori_hesaplama')->cascadeOnDelete()->cascadeOnUpdate();

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
