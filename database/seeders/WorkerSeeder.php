<?php
namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Rol;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = School::pluck('id')->toArray();
        $roles   = Rol::pluck('id')->toArray();
        $offers  = Offer::pluck('id')->toArray();

        DB::statement('TRUNCATE TABLE workers RESTART IDENTITY CASCADE');

        DB::table('workers')->insert([
            [
                'id_institucional' => '216550999',
                'nombre'           => 'Ximena',
                'apellido_materno' => 'Gómez',
                'apellido_paterno' => 'Mendoza',
                'email_institucional' => 'ximenagomez@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1980-01-01 07:29:10',
                'id_school'        => 2,
                'id_rol'           => 1,
                'id_offer'         => 4,
                'estado'           => '1',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216550999/ico_216550999.png',
            ],
            [
                'id_institucional' => '216551000',
                'nombre'           => 'Zafira',
                'apellido_materno' => 'Salazar',
                'apellido_paterno' => 'Herrera',
                'email_institucional' => 'zafirasalazar@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1980-01-02 07:29:10',
                'id_school'        => 5,
                'id_rol'           => 2,
                'id_offer'         => 12,
                'estado'           => '1',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216551000/ico_216551000.png',
            ],
            [
                'id_institucional' => '216551001',
                'nombre'           => 'Nailea',
                'apellido_materno' => 'Vega',
                'apellido_paterno' => 'Salinas',
                'email_institucional' => 'naileavega@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1980-01-03 07:29:10',
                'id_school'        => 4,
                'id_rol'           => 3,
                'id_offer'         => 6,
                'estado'           => '0',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216551001/ico_216551001.png',
            ],
            [
                'id_institucional' => '216551002',
                'nombre'           => 'Elian',
                'apellido_materno' => 'Ríos',
                'apellido_paterno' => 'Cruz',
                'email_institucional' => 'elianrios@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1980-01-04 07:29:10',
                'id_school'        => 4,
                'id_rol'           => 4,
                'id_offer'         => 18,
                'estado'           => '1',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216551002/ico_216551002.png',
            ],
            [
                'id_institucional' => '216551003',
                'nombre'           => 'Alaira',
                'apellido_materno' => 'Castro',
                'apellido_paterno' => 'Rojas',
                'email_institucional' => 'alairacastro@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1980-01-05 07:29:10',
                'id_school'        => 2,
                'id_rol'           => 5,
                'id_offer'         => 21,
                'estado'           => '0',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216551003/ico_216551003.png',
            ],
            [
                'id_institucional' => '216551004',
                'nombre'           => 'Renata',
                'apellido_materno' => 'Ramírez',
                'apellido_paterno' => 'Vázquez',
                'email_institucional' => 'renataramirez@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1970-01-09 07:29:10',
                'id_school'        => 6,
                'id_rol'           => 6,
                'id_offer'         => 11,
                'estado'           => '1',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216551004/ico_216551004.png',
            ],
            [
                'id_institucional' => '216551005',
                'nombre'           => 'Nairim',
                'apellido_materno' => 'Aguilar',
                'apellido_paterno' => 'Torres',
                'email_institucional' => 'nairimaguilar@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1985-01-12 07:29:10',
                'id_school'        => 2,
                'id_rol'           => 7,
                'id_offer'         => 13,
                'estado'           => '1',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216551005/ico_216551005.png',
            ],
            [
                'id_institucional' => '216551006',
                'nombre'           => 'Josef',
                'apellido_materno' => 'Hernández',
                'apellido_paterno' => 'Gutiérrez',
                'email_institucional' => 'josefhernandez@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1988-11-11 07:29:10',
                'id_school'        => 5,
                'id_rol'           => 8,
                'id_offer'         => 20,
                'estado'           => '1',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216551006/ico_216551006.png',
            ],
            [
                'id_institucional' => '216551007',
                'nombre'           => 'Erick',
                'apellido_materno' => 'Valencia',
                'apellido_paterno' => 'Pérez',
                'email_institucional' => 'erickvalencia@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1988-11-19 07:29:10',
                'id_school'        => 2,
                'id_rol'           => 9,
                'id_offer'         => 7,
                'estado'           => '1',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216551007/ico_216551007.png',
            ],
            [
                'id_institucional' => '216551008',
                'nombre'           => 'Daniel',
                'apellido_materno' => 'Peña',
                'apellido_paterno' => 'Díaz',
                'email_institucional' => 'danieldiaz@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1988-11-11 07:29:10',
                'id_school'        => 2,
                'id_rol'           => 10,
                'id_offer'         => 8,
                'estado'           => '1',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216551008/ico_216551008.png',
            ],
            [
                'id_institucional' => '216551009',
                'nombre'           => 'Jazive',
                'apellido_materno' => 'Aguilar',
                'apellido_paterno' => 'Torres',
                'email_institucional' => 'jaziveaguilar@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1988-09-11 07:29:10',
                'id_school'        => 7,
                'id_rol'           => 11,
                'id_offer'         => 15,
                'estado'           => '1',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216551009/ico_216551009.png',
            ],
            [
                'id_institucional' => '216551010',
                'nombre'           => 'Francisco',
                'apellido_materno' => 'Ríos',
                'apellido_paterno' => 'Castañeda',
                'email_institucional' => 'franciscorios@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1988-12-11 07:29:10',
                'id_school'        => 2,
                'id_rol'           => 15,
                'id_offer'         => 4,
                'estado'           => '1',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216551010/ico_216551010.png',
            ],
            [
                'id_institucional' => '216551011',
                'nombre'           => 'Armando',
                'apellido_materno' => 'Pérez',
                'apellido_paterno' => 'Ramos',
                'email_institucional' => 'armandoperez@alumnos.uacm.edu.mx',
                'fecha_nacimiento' => '1999-11-11 07:29:10',
                'id_school'        => 5,
                'id_rol'           => 16,
                'id_offer'         => 23,
                'estado'           => '1',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia_path'       => 'year_2026/workers/216551011/ico_216551011.png',
            ],
        ]);

        // factory
        // Worker::factory()
        //     ->count(4000)
        //     ->state(function () use ($schools, $roles, $offers) {
        //         return [
        //             'id_school' => fake()->randomElement($schools),
        //             'id_rol'    => fake()->randomElement($roles),
        //             'id_offer'  => fake()->randomElement($offers),
        //         ];
        //     })
        //     ->create();
    }
}
