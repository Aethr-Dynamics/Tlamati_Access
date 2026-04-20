<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate la tabla roles (opcional, dependiendo de tus necesidades)
        DB::table('rols')->truncate();

        // Insertar datos en la tabla roles
        DB::table('rols')->insert([
            [
                'id_rol' => 1,
                'rol' => 'Docente planta',
                'id_department' => 7,
                'descripcion' => 'Docente debase',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 2,
                'rol' => 'Docente contrato determinado',
                'id_department' => 7,
                'descripcion' => 'Docente de contrato',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 3,
                'rol' => 'Seguridad supervisor',
                'id_department' => 6,
                'descripcion' => 'Supervisor de seguridad',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 4,
                'rol' => 'Seguridad vigilante',
                'id_department' => 6,
                'descripcion' => 'Viguilante de la universidad',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 5,
                'rol' => 'Estudiante activo',
                'id_department' => 8,
                'descripcion' => 'Estudiante sin 100% de carrera',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 6,
                'rol' => 'Estudiante graduado',
                'id_department' => 8,
                'descripcion' => 'Estudiante con 100% de carrera',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 7,
                'rol' => 'Estudiante baja',
                'id_department' => 8,
                'descripcion' => 'Estudiante dado de baja',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 8,
                'rol' => 'Intendencia',
                'id_department' => 9,
                'descripcion' => 'Personal de limpieza',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 9,
                'rol' => 'Director',
                'id_department' => 9,
                'descripcion' => 'Director de área',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 10,
                'rol' => 'Coordinador Académico',
                'id_department' => 9,
                'descripcion' => 'Coordinador de academia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 11,
                'rol' => 'Secretario',
                'id_department' => 9,
                'descripcion' => 'Secretario de academia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 12,
                'rol' => 'Bibliotecario',
                'id_department' => 9,
                'descripcion' => 'Encargado de biblioteca',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 13,
                'rol' => 'Técnico de Laboratorio',
                'id_department' => 9,
                'descripcion' => 'Técnico de Laboratorio general',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 14,
                'rol' => 'Administrador',
                'id_department' => 9,
                'descripcion' => 'Administrador de academia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 15,
                'rol' => 'Recepcionista',
                'id_department' => 9,
                'descripcion' => 'Recepcionista general',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'id_rol' => 16,
                'rol' => 'Jefe de Carrera',
                'id_department' => 9,
                'descripcion' => 'Administrador de academia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ]
        ]);
    }
}
