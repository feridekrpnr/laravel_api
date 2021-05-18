<?php

namespace Database\Factories;

use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rol::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $factory->define(Rol::class, function(Faker $faker){
            $rol_adi = $faker->sentence(1);
        
        return [
            'rol_adi' => $rol_adi
        ];
    
});
