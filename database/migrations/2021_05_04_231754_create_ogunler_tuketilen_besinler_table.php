<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOgunlerTuketilenBesinlerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogunler_tuketilen_besinler', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('ogun_id');
            $table->unsignedBigInteger('tuketilen_besin_id');
            $table->foreign('ogun_id')->references('id')->on('ogunler')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('tuketilen_besin_id')->references('id')->on('tuketilen_besinler')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('ogunler_tuketilen_besinler');
    }
}
