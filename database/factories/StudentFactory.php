<?php
namespace Database\Factories;

use App\Models\Offer;
use App\Models\Rol;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre'           => $this->faker->firstName(),
            'apellido_paterno' => $this->faker->lastName(),
            'apellido_materno' => $this->faker->lastName(),

            'id_school'        => School::inRandomOrder()->value('id_school'),
            'id_rol'           => Rol::inRandomOrder()->value('id_rol'),
            'id_offer'         => Offer::inRandomOrder()->value('id_offer'),

            'estado'           => $this->faker->randomElement([1, 0]),
            'fecha_nacimiento' => $this->faker->date('Y-m-d'),
            'fotografia'       => null,
            'code_qr'          => null,
        ];
    }
}
