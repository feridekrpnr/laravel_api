<?php

namespace Database\Factories;

use App\Models\Besin;
use Illuminate\Database\Eloquent\Factories\Factory;

class BesinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Besin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'besin_adi' => $this->faker->name,
            'besin_kalori'=>$this->faker->numberBetween(1,10000),
            'besin_birimi'=>$this->faker->numberBetween(1,10000),
            'besin_kategori_id'=>rand(1,10)


        ];
    }
}
