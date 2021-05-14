<?php

namespace Database\Factories;

use App\Models\Diyetisyen;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiyetisyenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diyetisyen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'adi' => $this->faker->name,
            'soyad'=>$this->faker->name,
            'mail' => $this->faker->unique()->safeEmail,
            'parola'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'tc'=>$this->faker->unique(),
            'telefon'=>$this->faker->phoneNumber,
            'cinsiyet'=>$this->faker->numberBetween(1,2),
            'yas'=>$this->faker->numberBetween(1,90),
            'hakkımda' => $this->faker->text,
            'puan'=>$this->faker->numberBetween(1,100),
            'kullanici_id'=>rand(1,10)
        ];
    }
}
