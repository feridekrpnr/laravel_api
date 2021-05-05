<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneriOgunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oneri_ogun', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oneri_id');
            $table->unsignedBigInteger('ogun_id');
            $table->foreign('oneri_id')->references('id')->on('oneriler');
            $table->foreign('ogun_id')->references('id')->on('ogunler');
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
        Schema::dropIfExists('oneri_ogun');
    }
}
