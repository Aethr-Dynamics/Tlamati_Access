<?php
namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Rol;
use App\Models\School;
use App\Models\Worker;
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
                'nombre'           => 'Ximena',
                'apellido_materno' => 'Zaldívar',
                'apellido_paterno' => 'Arencibia',
                'id_school'        => 1,
                'id_rol'           => 1,
                'id_offer'         => 1,
                'estado'           => 'Activo',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'nombre'           => 'Jazibe',
                'apellido_materno' => 'Marzán',
                'apellido_paterno' => 'Villaseñor',
                'id_school'        => 2,
                'id_rol'           => 2,
                'id_offer'         => 2,
                'estado'           => 'Activo',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'nombre'           => 'Alma',
                'apellido_materno' => 'Téllez',
                'apellido_paterno' => 'Portillo',
                'id_school'        => 3,
                'id_rol'           => 3,
                'id_offer'         => 3,
                'estado'           => 'Activo',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'nombre'           => 'Salma',
                'apellido_materno' => 'Padilla',
                'apellido_paterno' => 'Riojas',
                'id_school'        => 4,
                'id_rol'           => 4,
                'id_offer'         => 4,
                'estado'           => 'Activo',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'nombre'           => 'Sofía',
                'apellido_materno' => 'Luevano',
                'apellido_paterno' => 'Castellano',
                'id_school'        => 5,
                'id_rol'           => 4,
                'id_offer'         => 5,
                'estado'           => 'Activo',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'nombre'           => 'Oriol',
                'apellido_materno' => 'Serra',
                'apellido_paterno' => 'Arenas',
                'id_school'        => 6,
                'id_rol'           => 6,
                'id_offer'         => 6,
                'estado'           => 'Activo',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'nombre'           => 'Francisco',
                'apellido_materno' => 'Javier',
                'apellido_paterno' => 'Plaza',
                'id_school'        => 7,
                'id_rol'           => 7,
                'id_offer'         => 7,
                'estado'           => 'Activo',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
        ]);

        // factory
        Worker::factory()
            ->count(4000)
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
