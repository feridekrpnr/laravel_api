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

            $table->id();
            $table->string('adi', 30);
            $table->string('soyad', 30);
            $table->string('mail', 150)->unique();
            $table->string('parola', 12);
            $table->string('tc',11)->unique();
            $table->string('telefon', 11);
            $table->smallInteger('cinsiyet');
            $table->integer('yas');
            $table->dateTime('kayit_tarihi');
            $table->smallInteger('aktif');
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('roller');
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
