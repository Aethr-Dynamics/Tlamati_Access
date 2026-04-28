<?php
namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Rol;
use App\Models\School;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = School::pluck('id')->toArray();
        $roles   = Rol::pluck('id')->toArray();
        $offers  = Offer::pluck('id')->toArray();

        DB::statement('TRUNCATE TABLE students RESTART IDENTITY CASCADE');

        // Insertar datos reales primero
        DB::table('students')->insert([
            [
                'nombre'           => 'Sonia',
                'apellido_materno' => 'Rodríguez',
                'apellido_paterno' => 'Valencia',
                'id_school'        => 1,
                'id_rol'           => 5,
                'id_offer'         => 1,
                'estado'           => '0',
                'fecha_nacimiento' => '2004-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'nombre'           => 'Ismael',
                'apellido_materno' => 'Vélez',
                'apellido_paterno' => 'Cadena',
                'id_school'        => 2,
                'id_rol'           => 5,
                'id_offer'         => 2,
                'estado'           => '1',
                'fecha_nacimiento' => '2003-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'nombre'           => 'Asier',
                'apellido_materno' => 'Olvera',
                'apellido_paterno' => 'Razo',
                'id_school'        => 3,
                'id_rol'           => 5,
                'id_offer'         => 3,
                'estado'           => '1',
                'fecha_nacimiento' => '2002-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'nombre'           => 'Eric',
                'apellido_materno' => 'Serrato',
                'apellido_paterno' => 'Cuellar',
                'id_school'        => 4,
                'id_rol'           => 5,
                'id_offer'         => 4,
                'estado'           => '1',
                'fecha_nacimiento' => '2001-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'nombre'           => 'Nayara',
                'apellido_materno' => 'Velasco',
                'apellido_paterno' => 'Betancourt',
                'id_school'        => 5,
                'id_rol'           => 5,
                'id_offer'         => 5,
                'estado'           => '1',
                'fecha_nacimiento' => '2000-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'nombre'           => 'Zoe',
                'apellido_materno' => 'Rojas',
                'apellido_paterno' => 'Calderón',
                'id_school'        => 6,
                'id_rol'           => 6,
                'id_offer'         => 6,
                'estado'           => '1',
                'fecha_nacimiento' => '1999-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'nombre'           => 'Aaron',
                'apellido_materno' => 'Vela',
                'apellido_paterno' => 'Rodríquez',
                'id_school'        => 7,
                'id_rol'           => 8,
                'id_offer'         => 7,
                'estado'           => '1',
                'fecha_nacimiento' => '2025-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
        ]);

        // factory
        Student::factory()
            ->count(3000)
            ->state(function () use ($schools, $roles, $offers) {
                return [
                    'id_school' => fake()->randomElement($schools),
                    'id_rol'    => fake()->randomElement($roles),
                    'id_offer'  => fake()->randomElement($offers),
                ];
            })
            ->create();
    }
}
