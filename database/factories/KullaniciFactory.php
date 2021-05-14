<?php

namespace Database\Factories;

use App\Models\Kullanici;
use Illuminate\Database\Eloquent\Factories\Factory;

class KullaniciFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kullanici::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'kayit_tarihi'=>$this->faker->dateTime(),
            'aktif'=>$this->faker->numberBetween(1,2),
            'rol_id'=>rand(1,10)
        ];
    }
}
