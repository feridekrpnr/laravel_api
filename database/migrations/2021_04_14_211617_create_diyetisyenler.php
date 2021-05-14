<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiyetisyenler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diyetisyenler', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('adi', 30);
            $table->string('soyad', 30);
            $table->string('mail', 150)->unique();
            $table->string('parola', 12);
            $table->string('tc',11)->unique();
            $table->string('telefon', 11);
            $table->smallInteger('cinsiyet');
            $table->integer('yas');
            $table->text('hakkimda',350)->nullable();
            $table->double('puan',30)->nullable();
            $table->unsignedBigInteger('kullanici_id');
            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->cascadeOnDelete()->cascadeOnUpdate();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diyetisyenler');
    }
}
