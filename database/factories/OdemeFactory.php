<?php

namespace Database\Factories;

use App\Models\Odeme;
use Illuminate\Database\Eloquent\Factories\Factory;

class OdemeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Odeme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* sssreturn [

             'odeme_tarih'=>$this->faker->dateTime(),
             'oneri_aciklama'=>$this->faker->text,
             'odemetürü_id' => $this->faker->unique()->safeEmail,
             'parola'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
             'tc'=>$this->faker->unique(),
             'telefon'=>$this->faker->phoneNumber,
             'cinsiyet'=>$this->faker->numberBetween(1,2),
             'yas'=>$this->faker->numberBetween(1,90),
             'odeme_tarih'=>$this->faker->dateTime(),
             'aktif'=>$this->faker->numberBetween(1,2),
             'rol_id'=>rand(1,10)

         ]; */

    }
}
