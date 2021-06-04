<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBesinlerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('besinler', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('besin_adi',70);
            $table->integer('besin_kalori');
            $table->string('besin_birimi',30);
            $table->integer('adet')->nullable();
            $table->unsignedBigInteger('besin_kategori_id');
            $table->foreign('besin_kategori_id')->references('id')->on('besin_kategori')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('besinler');
    }
}
