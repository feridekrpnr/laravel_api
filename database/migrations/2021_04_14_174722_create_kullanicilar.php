<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKullanicilar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kullanicilar', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('rol');
            $table->string('email'); //string varchar yapar var mı başka bişey? bide controllerları oluşturduk
            $table->string('token');
            $table->string('password');
            $table->unsignedBigInteger('rol_id')->nullable();
            $table->foreign('rol_id')->references('id')->on('roller')->cascadeOnDelete()->cascadeOnUpdate();
        });


    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kullanicilar');
    }
}
