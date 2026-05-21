<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('TRUNCATE TABLE schools RESTART IDENTITY CASCADE');

        // Insertar datos en la tabla schools
        DB::table('schools')->insert([
            [
                'plantel'   => 'Casa Libertad',
                'direccion' => 'Calzada Ermita Iztapalapa 4163, Colonia Lomas de Zaragoza, Alcaldía Iztapalapa 09620 Ciudad de México',
                'correo'    => 'coordinacion.casalibertad@uacm.edu.mx',
                'telefono'  => '(55)5858-0538 Ext. 12000',
            ],
            [
                'plantel'   => 'Centro Histórico',
                'direccion' => 'Ave. Fray Servando Teresa de Mier 92 y 99, Col. Obrera, Alcaldía Cuauhtémoc C.P. 06080 Ciudad de México',
                'correo'    => ' coordinacion.centrohistorico@uacm.edu.mx',
                'telefono'  => '(55) 5134 - 9804 Ext. 11750',
            ],
            [
                'plantel'   => 'Cuautepec',
                'direccion' => 'Avenida La Corona No. 320, Colonia Loma la Palma, Alcaldía Gustavo A. Madero, C.P. 07160 Ciudad de México',
                'correo'    => null,
                'telefono'  => '55 5134 9804 Ext. 18122',
            ],
            [
                'plantel'   => 'Plantel Del Valle',
                'direccion' => 'Calle San Lorenzo 290, Colonia Del Valle Sur, Alcaldía Benito Juárez C.P. 03100 Ciudad de México',
                'correo'    => null,
                'telefono'  => '55 5488 6661 Ext. 15406',
            ],
            [
                'plantel'   => 'San Lorenzo Tezonco',
                'direccion' => 'Prolongación San Isidro 151, Colonia San Lorenzo Tezonco, Alcaldía Iztapalapa C.P. 09790 Ciudad de México',
                'correo'    => null,
                'telefono'  => '55 5134 9804 Ext. 13062',
            ],
            [
                'plantel'   => 'Sede Administrativa',
                'direccion' => 'Dr. García Diego No. 168, Colonia Doctores Alcaldía Cuauhtémoc Ciudad de México, C.P. 06720.',
                'correo'    => 'coord.administrativos@uacm.edu.mx',
                'telefono'  => '1107-0280 Ext. 16000',
            ],
            [
                'plantel'   => 'Centro Vlady',
                'direccion' => 'Calle Goya núm. 63, Col. Insurgentes Mixcoac, Alcaldía Benito Juárez, México, Ciudad de México, C.P. 03920.',
                'correo'    => 'centrovlady@gmail.com',
                'telefono'  => '(55) 5611 7691 ',
            ],
        ]);
    }
}
