<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('TRUNCATE TABLE offers RESTART IDENTITY CASCADE');

        // Insertar datos en la tabla ofertas
        DB::table('offers')->insert([
            [
                'nombre' => 'Licenciatura en Arte y Patrimonio Cultural',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Ciencia Política y Administración Urbana',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Ciencias Sociales',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Comunicación y Cultura',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Creación Literaria',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Filosofía e Historia de las Ideas',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Historia y Sociedad Contemporánea',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Derecho',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Maestría en Defensa y Promoción de los Derechos Humanos',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Maestría Ciencias Sociales',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Maestría y Doctorado en Estudios Semióticos',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Ciencias Ambientales',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Nutrición y Salud',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Protección Civil y Gestión de Riesgos',

                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Posgrado Ciencias de la Complejidad',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Maestría Educación Ambiental',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Centro De Estudios Sobre la Ciudad',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Ciencias Genómicas',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Ingeniería en Sistemas de Transporte Urbano',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Ingeniería en Sistemas Electrónicos Industriales',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Ingeniería de Software',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Ingeniería en Sistemas Electrónicos y de Telecomunicaciones',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Ingeniería en Sistemas Energéticos',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Licenciatura en Modelación Matemática',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Posgrado Ciencias Genómicas',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nombre' => 'Maestría en Ingeniería Energética',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
        ]);
    }
}
