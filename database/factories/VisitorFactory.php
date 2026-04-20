<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Visitor; // Asegúrate de importar el modelo Visitante

class VisitorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visitor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generar instancias de faker en español
        $faker = Factory::create('es_ES');

        return [
            'nombre' => $faker->firstName,
            'apellido_paterno' => $faker->lastName,
            'apellido_materno' => $faker->optional(0.5)->lastName,
            'motivo' => $faker->sentence,
            'es_menor' => $faker->boolean(),
            'identificacion' => $faker->unique()->bothify('??-####'),
            'code_qr' => $faker->sha256,
            'reactivacion' => $faker->boolean(),
            'fechas_impresion' => json_encode($faker->dateTimeRange('-1 month', 'now')),
        ];
    }
}
