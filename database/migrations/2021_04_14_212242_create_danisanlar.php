<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanisanlar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danisanlar', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_turkish_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('adi', 30)->nullable();
            $table->string('soyad', 30)->nullable();
            $table->string('tc',11)->unique()->nullable();
            $table->string('telefon', 11)->nullable();
            $table->smallInteger('cinsiyet')->nullable();
            $table->integer('yas')->nullable();
            $table->double('danisan_boy')->nullable();
            $table->double('danisan_kilo')->nullable();
            $table->integer('kronik_rahatsizlik')->nullable();
            $table->integer('ilac')->nullable();
            $table->integer('alkol')->nullable();
            $table->integer('disari_yemek')->nullable();
            $table->integer('gunluk_ogun')->nullable();
            $table->integer('gunluk_su')->nullable();
            $table->integer('hedef_kilo')->nullable();
            $table->text('sevilen_besin',350)->nullable();
            $table->text('sevilmeyen_besin',350)->nullable();
            $table->text('aciklama',350)->nullable();
            $table->unsignedBigInteger('kullanici_id')->unique();
            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('rol_id')->unique()->nullable();
            $table->foreign('rol_id')->references('id')->on('roller')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *neverse the migration
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danisanlar');
    }
}
