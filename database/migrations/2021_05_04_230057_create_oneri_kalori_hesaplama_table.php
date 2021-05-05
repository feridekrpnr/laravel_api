<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneriKaloriHesaplamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oneri_kalori_hesaplama', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oneri_id');
            $table->unsignedBigInteger('kalori_hesaplama_id');
            $table->foreign('oneri_id')->references('id')->on('oneriler');
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
        Schema::dropIfExists('oneri_kalori_hesaplama');
    }
}
