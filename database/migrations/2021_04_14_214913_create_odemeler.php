<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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

            $table->id();
            $table->dateTime('odeme_tarih')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('oneri_aciklama',350);

            $table->unsignedBigInteger('odemeturu_id');
            $table->unsignedBigInteger('diyetisyen_id');
            $table->unsignedBigInteger('danisan_id');
            $table->unsignedBigInteger('ucret_id');
            $table->foreign('ucret_id')->references('id')->on('ucretler');
            $table->foreign('danisan_id')->references('id')->on('danisanlar');
            /*

            $table->foreign('odemeturu_id')->references('id')->on('odemeturleri');
            $table->foreign('diyetisyen_id')->references('id')->on('diyetisyenler');
            */

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
