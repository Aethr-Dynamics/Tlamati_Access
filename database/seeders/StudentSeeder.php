<?php
namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Rol;
use App\Models\School;
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
                'id_institucional' => '220111272',
                'nombre'           => 'Valeria',
                'apellido_materno' => 'Morales',
                'apellido_paterno' => 'Vargas',
                'email_institucional' => 'valeriamoralesvaleriamorales@alumnos.uacm.edu.mx',
                'id_school'        => 4,
                'id_rol'           => 12,
                'id_offer'         => 25,
                'estado'           => '1',
                'fecha_nacimiento' => '2004-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia'       => 'year_2026/students/220111272/ico_220111272.png',
            ],
            [
                'id_institucional' => '220111273',
                'nombre'           => 'Aitana',
                'apellido_materno' => 'Luna',
                'apellido_paterno' => 'Castro',
                'email_institucional' => 'aitanaluna@alumnos.uacm.edu.mx',
                'id_school'        => 2,
                'id_rol'           => 12,
                'id_offer'         => 1,
                'estado'           => '1',
                'fecha_nacimiento' => '2003-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia'       => 'year_2026/students/220111273/ico_220111273.png',
            ],
            [
                'id_institucional' => '220111274',
                'nombre'           => 'Damian',
                'apellido_materno' => 'Juárez',
                'apellido_paterno' => 'Reyes',
                'email_institucional' => 'damianjuarez@alumnos.uacm.edu.mx',
                'id_school'        => 1,
                'id_rol'           => 12,
                'id_offer'         => 2,
                'estado'           => '1',
                'fecha_nacimiento' => '2002-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia'       => 'year_2026/students/220111274/ico_220111274.png',
            ],
            [
                'id_institucional' => '220111275',
                'nombre'           => 'Anahí',
                'apellido_materno' => 'Juárez',
                'apellido_paterno' => 'Soto',
                'email_institucional' => 'anahijuarez@alumnos.uacm.edu.mx',
                'id_school'        => 5,
                'id_rol'           => 13,
                'id_offer'         => 5,
                'estado'           => '1',
                'fecha_nacimiento' => '2001-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia'       => 'year_2026/students/220111275/ico_220111275.png',
            ],
            [
                'id_institucional' => '220111276',
                'nombre'           => 'Iriel',
                'apellido_materno' => 'Mendoza',
                'apellido_paterno' => 'Soto',
                'email_institucional' => 'irielmendoza@alumnos.uacm.edu.mx',
                'id_school'        => 4,
                'id_rol'           => 13,
                'id_offer'         => 9,
                'estado'           => '1',
                'fecha_nacimiento' => '2000-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia'       => 'year_2026/students/220111276/ico_220111276.png',
            ],
            [
                'id_institucional' => '220111277',
                'nombre'           => 'Laura',
                'apellido_materno' => 'Cárdenas',
                'apellido_paterno' => 'Guzmán',
                'email_institucional' => 'lauracardenas@alumnos.uacm.edu.mx',
                'id_school'        => 4,
                'id_rol'           => 13,
                'id_offer'         => 6,
                'estado'           => '1',
                'fecha_nacimiento' => '1999-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia'       => 'year_2026/students/220111277/ico_220111277.png',
            ],
            [
                'id_institucional' => '220111278',
                'nombre'           => 'Nadir',
                'apellido_materno' => 'Jiménez',
                'apellido_paterno' => 'Ortiz',
                'email_institucional' => 'nadirjimenez@alumnos.uacm.edu.mx',
                'id_school'        => 7,
                'id_rol'           => 8,
                'id_offer'         => 7,
                'estado'           => '1',
                'fecha_nacimiento' => '2025-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia'       => 'year_2026/students/220111278/ico_220111278.png',
            ],
            [
                'id_institucional' => '220111279',
                'nombre'           => 'Zaireth',
                'apellido_materno' => 'Guerrero',
                'apellido_paterno' => 'Vargas',
                'email_institucional' => 'zairethguerrero@alumnos.uacm.edu.mx',
                'id_school'        => 2,
                'id_rol'           => 12,
                'id_offer'         => 21,
                'estado'           => '1',
                'fecha_nacimiento' => '2025-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia'       => 'year_2026/students/220111279/ico_220111279.png',
            ],
            [
                'id_institucional' => '220111280',
                'nombre'           => 'Nahual',
                'apellido_materno' => 'Quintero',
                'apellido_paterno' => 'Ramírez',
                'email_institucional' => 'nahualquintero@alumnos.uacm.edu.mx',
                'id_school'        => 2,
                'id_rol'           => 14,
                'id_offer'         => 21,
                'estado'           => '1',
                'fecha_nacimiento' => '2025-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia'       => 'year_2026/students/220111280/ico_220111280.png',
            ],            

            // --- Equipo de desarrollo
            [
                'id_institucional' => '210110995',
                'nombre'           => 'Kevin Manzur',
                'apellido_materno' => 'Rodriguez',
                'apellido_paterno' => 'Cervantes',
                'email_institucional' => 'kevinmanzurrodriguez@alumnos.uacm.edu.mx',
                'id_school'        => 4,
                'id_rol'           => 13,
                'id_offer'         => 21,
                'estado'           => '1',
                'fecha_nacimiento' => '2025-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia'       => 'year_2026/students/210110995/ico_210110995.png',
            ],            
            [
                'id_institucional' => '210111262',
                'nombre'           => 'Guadalupe Yamileth',
                'apellido_materno' => 'Valadez',
                'apellido_paterno' => 'Carmona',
                'email_institucional' => 'guadalupeyamilethvaladez@alumnos.uacm.edu.mx',
                'id_school'        => 4,
                'id_rol'           => 13,
                'id_offer'         => 21,
                'estado'           => '1',
                'fecha_nacimiento' => '2025-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia'       => 'year_2026/students/210111262/ico_210111262.png',
            ],            
            [
                'id_institucional' => '200110828',
                'nombre'           => 'Alejandro',
                'apellido_materno' => 'Viveros',
                'apellido_paterno' => 'Hernández',
                'email_institucional' => 'alejandroviveros@alumnos.uacm.edu.mx',
                'id_school'        => 4,
                'id_rol'           => 13,
                'id_offer'         => 21,
                'estado'           => '1',
                'fecha_nacimiento' => '2025-05-20 07:29:10',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'fotografia'       => 'year_2026/students/200110828/ico_200110828.png',
            ],            
            // --- /Equipo de desarrollo

        ]);

        // factory
        // Student::factory()
        //     ->count(3000)
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
