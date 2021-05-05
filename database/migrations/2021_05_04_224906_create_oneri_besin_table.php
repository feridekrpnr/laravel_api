<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneriBesinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oneri_besin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oneri_id');
            $table->unsignedBigInteger('besin_id');
            $table->foreign('oneri_id')->references('id')->on('oneriler');
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
        Schema::dropIfExists('oneri_besin');
    }
}
