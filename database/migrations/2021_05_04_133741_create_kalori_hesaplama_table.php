<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaloriHesaplamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kalori_hesaplama', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('tuketilen_kalori',70);
            $table->unsignedBigInteger('oneri_id');
            $table->foreign('oneri_id')->references('id')->on('oneriler');
            $table->unsignedBigInteger('tuketilen_besin_id');
            //$table->foreign('tuketilen_besin_id')->references('id')->on('tuketilen_besinler');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kalori_hesaplama');
    }
}
