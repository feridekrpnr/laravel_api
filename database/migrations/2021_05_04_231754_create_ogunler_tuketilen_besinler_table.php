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
            $table->id();
            $table->unsignedBigInteger('ogun_id');
            $table->unsignedBigInteger('tuketilen_besin_id');
            $table->foreign('ogun_id')->references('id')->on('ogunler');
            $table->foreign('tuketilen_besin_id')->references('id')->on('tuketilen_besinler');
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
