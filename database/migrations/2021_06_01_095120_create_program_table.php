<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateprogramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('kalori',70)->nullable();
            $table->text('mesaj',350)->nullable();
            $table->unsignedBigInteger('danisan_id');
            $table->unsignedBigInteger('diyetisyen_id');
            $table->foreign('danisan_id')->references('id')->on('danisanlar')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('diyetisyen_id')->references('id')->on('diyetisyenler')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('ogun_id');
            $table->unsignedBigInteger('besin_id');
            $table->foreign('ogun_id')->references('id')->on('ogunler')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('besin_id')->references('id')->on('besinler')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('program');
    }
}
