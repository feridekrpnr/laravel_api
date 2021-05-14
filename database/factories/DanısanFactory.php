<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class DanısanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'danısan_boy' => $this->faker->randomFloat(),
            'danısan_kilo'=>$this->faker->numberBetween(1,150),
            'kullanici_id'=>rand(1,10)

        ];
    }
}
