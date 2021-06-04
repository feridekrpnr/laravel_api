<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneriler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oneriler', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->dateTime('oneri_tarih')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('oneri_aciklama');
            $table->integer('oneri_kalori');

            $table->unsignedBigInteger('besin_id');
            $table->unsignedBigInteger('danisan_id');
            $table->unsignedBigInteger('diyetisyen_id');
            $table->foreign('diyetisyen_id')->references('id')->on('diyetisyenler')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('danisan_id')->references('id')->on('danisanlar')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('besin_id')->references('id')->on('besinler')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oneriler');
    }
}
