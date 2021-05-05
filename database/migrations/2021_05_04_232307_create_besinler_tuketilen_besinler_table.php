<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBesinlerTuketilenBesinlerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('besinler_tuketilen_besinler', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('tuketilen_besin_id');
            $table->unsignedBigInteger('besin_id');
            $table->foreign('tuketilen_besin_id')->references('id')->on('tuketilen_besinler');
            $table->foreign('besin_id')->references('id')->on('besinler');

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
        Schema::dropIfExists('besinler_tuketilen_besinler');
    }
}
