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
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('tarih')->nullable();
            $table->string('kalori')->nullable();
            $table->unsignedBigInteger('danisan_id');
            $table->foreign('danisan_id')->references('id')->on('danisanlar')->cascadeOnDelete();
            $table->unsignedBigInteger('ogun_id');
            $table->foreign('ogun_id')->references('id')->on('ogunler')->cascadeOnDelete();
            $table->unsignedBigInteger('besin_id');
            $table->foreign('besin_id')->references('id')->on('besinler')->cascadeOnDelete();

        

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
