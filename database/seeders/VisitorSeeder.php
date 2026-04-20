<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertar datos en la tabla visitantes
        DB::table('visitors')->insert([
            [
                'id_visitor' => 1,
                'nombre' => 'María',
                'apellido_paterno' => 'García',
                'motivo' => 'Reunión con director',
                'es_menor' => 0,
                'identificacion' => 'AM-12345678',
                'code_qr' => 'QR-VIS-001',
                'fechas_impresion' => '["2025-05-20 01:18:28"]',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                 
            ],
            [
                'id_visitor' => 2,
                'nombre' => 'Juan',
                'apellido_paterno' => 'Pérez',
                'motivo' => 'Entrega de documentos',
                'es_menor' => 0,
                'identificacion' => 'IN-98765432',
                'code_qr' => 'QR-VIS-002',
                'fechas_impresion' => '["2025-05-20 01:20:38"]',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                 
            ],
            [
                'id_visitor' => 3,
                'nombre' => 'Ana',
                'apellido_paterno' => 'López',
                'motivo' => 'Visita a hijo estudiante',
                'es_menor' => 1,
                'identificacion' => 'AM-56781234',
                'code_qr' => 'QR-VIS-003',
                'fechas_impresion' => '["2025-05-15 06:15:33", "2025-05-19 05:15:07"]',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                 
            ]
        ]);
    }
}
