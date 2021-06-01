<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOdemeler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odemeler', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->engine = 'InnoDB';

            $table->id();
            $table->dateTime('odeme_tarih')->default(DB::raw('CURRENT_TIMESTAMP'));

            //$table->unsignedBigInteger('odemeturu_id');
            $table->unsignedBigInteger('diyetisyen_id');
            $table->unsignedBigInteger('danisan_id');
            $table->unsignedBigInteger('ucret_id');
            $table->foreign('ucret_id')->references('id')->on('ucretler')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('danisan_id')->references('id')->on('danisanlar')->cascadeOnDelete()->cascadeOnUpdate();

            //$table->foreign('odemeturu_id')->references('id')->on('odemeturleri')->cascadeOnDelete()->cascadeOnUpdate();
           $table->foreign('diyetisyen_id')->references('id')->on('diyetisyenler')->cascadeOnDelete()->cascadeOnUpdate();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odemeler');
    }
}
