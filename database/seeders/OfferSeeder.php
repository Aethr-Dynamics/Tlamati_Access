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
        // Truncate la tabla ofertas (opcional, dependiendo de tus necesidades)
        DB::table('offers')->truncate();

        // Insertar datos en la tabla ofertas
        DB::table('offers')->insert([
            [
                'id_offer'     => 1,
                'nombre' => 'Licenciatura en Arte y Patrimonio Cultural',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 2,
                'nombre' => 'Licenciatura en Ciencia Política y Administración Urbana',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 3,
                'nombre' => 'Licenciatura en Ciencias Sociales',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 4,
                'nombre' => 'Licenciatura en Comunicación y Cultura',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 5,
                'nombre' => 'Licenciatura en Creación Literaria',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 6,
                'nombre' => 'Licenciatura en Filosofía e Historia de las Ideas',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 7,
                'nombre' => 'Licenciatura en Historia y Sociedad Contemporánea',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 8,
                'nombre' => 'Licenciatura en Derecho',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 9,
                'nombre' => 'Maestría en Defensa y Promoción de los Derechos Humanos',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 10,
                'nombre' => 'Maestría Ciencias Sociales',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 11,
                'nombre' => 'Maestría y Doctorado en Estudios Semióticos',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 12,
                'nombre' => 'Licenciatura en Ciencias Ambientales',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 13,
                'nombre' => 'Licenciatura en Nutrición y Salud',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 14,
                'nombre' => 'Licenciatura en Protección Civil y Gestión de Riesgos',

                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 15,
                'nombre' => 'Posgrado Ciencias de la Complejidad',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 16,
                'nombre' => 'Maestría Educación Ambiental',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 17,
                'nombre' => 'Centro De Estudios Sobre la Ciudad',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 18,
                'nombre' => 'Licenciatura en Ciencias Genómicas',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 19,
                'nombre' => 'Licenciatura en Ingeniería en Sistemas de Transporte Urbano',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 20,
                'nombre' => 'Licenciatura en Ingeniería en Sistemas Electrónicos Industriales',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 21,
                'nombre' => 'Ingeniería de Software',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 22,
                'nombre' => 'Licenciatura en Ingeniería en Sistemas Electrónicos y de Telecomunicaciones',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 23,
                'nombre' => 'Licenciatura en Ingeniería en Sistemas Energéticos',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 24,
                'nombre' => 'Licenciatura en Modelación Matemática',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 25,
                'nombre' => 'Posgrado Ciencias Genómicas',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_offer'     => 26,
                'nombre' => 'Maestria en Ingeniería Energética',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
        ]);
    }
}
