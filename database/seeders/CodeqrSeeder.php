<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodeqrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('TRUNCATE TABLE codeqrs RESTART IDENTITY CASCADE');

        // Insertar datos en la tabla roles
        DB::table('codeqrs')->insert([
            
            // ----------------------------------
            // Workers
            // ----------------------------------
            [
                'id_student'   => null,
                'id_worker'    => 1,
                'id_visitor'   => null,
                'access_token' => '165faf32575e0d589af7f7115e97fb1bdbd7040acc86c11ff7028484e308b2fd',
                'token_hash'   => 'de23353d41f5c34218f7895bc03c911cca80c7f7b9165f8c69ead9e04902b665',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216550999/QR_workers_216550999.png',
            ],
            [
                'id_student'   => null,
                'id_worker'    => 2,
                'id_visitor'   => null,
                'access_token' => '55818b55bdfb923c5c08c2239cb3db8bc854487fa41c47d1374a0f43eba97cc0',
                'token_hash'   => 'b368cb15e944b3902cd7cf18df9cc2b199d645fd301706e3c9e4fd957b1c60c1',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216551000/QR_workers_216551000.png',
            ],
            [
                'id_student'   => null,
                'id_worker'    => 3,
                'id_visitor'   => null,
                'access_token' => '378e46c39fe4c75eca7543bc63fd2a73a174b0b3e233d9868d3ff0be70a0b26f',
                'token_hash'   => '6c3618fbf756fbcb8ac697610c13d4bc791bd12cf450a2ff3bc05e6d432db65f',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216551001/QR_workers_216551001.png',
            ],
            [
                'id_student'   => null,
                'id_worker'    => 4,
                'id_visitor'   => null,
                'access_token' => '4516d62969c742412fd89d2b2c6ad209111075c5371c50fcc9eb9c84f8080b43',
                'token_hash'   => 'f9053cf9db5e6e1685986c6d0c96c4509630f303e4c971d3e0c80d7336ce5c33',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216551002/QR_workers_216551002.png',
            ],
            [
                'id_student'   => null,
                'id_worker'    => 5,
                'id_visitor'   => null,
                'access_token' => '2aee98dac82bca0b5097b3565ccf6aef4a75d742ba28b494d248858fe48363e0',
                'token_hash'   => '25b9873523e844d2e9ac95a3039c86051fa436c493b2dc34ab14f3fe99f22182',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216551003/QR_workers_216551003.png',
            ],
            [
                'id_student'   => null,
                'id_worker'    => 6,
                'id_visitor'   => null,
                'access_token' => 'e8107864cc498a702c90561f1a5c676f9431f775841b7df73538d4f90af21c03',
                'token_hash'   => 'cdf3a110d40dbbd6bbf15e8c59d104d4c1947b3e4e110e01aeaa6d003514c4af',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216551004/QR_workers_216551004.png',
            ],
            [
                'id_student'   => null,
                'id_worker'    => 7,
                'id_visitor'   => null,
                'access_token' => 'e599bc3ce04c3e97037835bf6f80d152b788380cff27121e8bbe277045b34282',
                'token_hash'   => '6b08000dbf60021e70b12012e5ff9e095d0b918c0ab7a7d118537f1d9567cf64',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216551005/QR_workers_216551005.png',
            ],
            [
                'id_student'   => null,
                'id_worker'    => 8,
                'id_visitor'   => null,
                'access_token' => 'f6dbbf8564032f01fad9308cfff8fd30152c6ffef35f025830eddcea98526dcb',
                'token_hash'   => '0d48280cb7190609aee64b3808e6f94e475c13eafe2c8bf8b456526821295368',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216551006/QR_workers_216551006.png',
            ],
            [
                'id_student'   => null,
                'id_worker'    => 9,
                'id_visitor'   => null,
                'access_token' => '1445327848aa43fe9ef522c3b7c325ad377b8692ff9834c9ee9433250c798151',
                'token_hash'   => 'c9ff4fab40cd19ee6a1cd45788112eae151b0bfc5eecb7751e8887fb65eff834',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216551007/QR_workers_216551007.png',
            ],
            [
                'id_student'   => null,
                'id_worker'    => 10,
                'id_visitor'   => null,
                'access_token' => '079e5169223f77d5a266861d400fd260f15cc65b31843ce08939127d63f44ded',
                'token_hash'   => '4383562f8b088495a6421c1390e9a01e549177080b73fa21b484a1831cb439cf',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216551008/QR_workers_216551008.png',
            ],
            [
                'id_student'   => null,
                'id_worker'    => 11,
                'id_visitor'   => null,
                'access_token' => '38ed1225c624e1253e95152327e3eabfe9a09c5a6193bba8c5f10379e73eabe7',
                'token_hash'   => 'f4ed808ed8d00bcaf538ef5e3ca6e37520e7f056118c3de97a4b202f1e932b72',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216551009/QR_workers_216551009.png',
            ],
            [
                'id_student'   => null,
                'id_worker'    => 12,
                'id_visitor'   => null,
                'access_token' => '3c76d6065125f228230c34cfe54223a4cc04589d207bdea483800af49ff5333d',
                'token_hash'   => '1c51731b0ca5d03765f5f34b596f554a0db7ce346b141425ac3ff3c529e98823',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216551010/QR_workers_216551010.png',
            ],
            [
                'id_student'   => null,
                'id_worker'    => 13,
                'id_visitor'   => null,
                'access_token' => '8f96a703bf5dc5c40513df3b0410503d2b62e83855724d1f703ec35b6fa171a3',
                'token_hash'   => '528c5cd86bd065fc1b56d206d5c9c17d251d3dfbe3598a41ff4613db1ead9660',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/workers/216551011/QR_workers_216551011.png',
            ],

            // ----------------------------------
            // Students
            // ----------------------------------
            [
                'id_student'   => 9,
                'id_worker'    => null,
                'id_visitor'   => null,
                'access_token' => '7a7962d07de02730a6bfc161c42d6245fd0ec091ade680ac65b50b4877411af9',
                'token_hash'   => '18db7c9e45c55e19a59aa3572e48c445acab61e7accd51ff71cea1a9a3f403d8',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/students/220111280/QR_students_220111280.png',
            ],
            [
                'id_student'   => 8,
                'id_worker'    => null,
                'id_visitor'   => null,
                'access_token' => '1c08dca7f53fa809c11e6ff970c4a8c7e2d2d6b0e00e2f14f0019120dc7e4a27',
                'token_hash'   => 'd83740eeee2e971345accee8ce617c8680258440fc87a052ef48ac50b3fe78a1',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/students/220111279/QR_students_220111279.png',
            ],
            [
                'id_student'   => 7,
                'id_worker'    => null,
                'id_visitor'   => null,
                'access_token' => '2429ea081beb3c39a35160de8985fa6bd0cdf48c1e132bcafec3c611c268c5ad',
                'token_hash'   => 'aec932c974dafc9faf21a619f65a928c9a2a7b1f5a2b469e2376a1e1fb1955b5',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/students/220111278/QR_students_220111278.png',
            ],
            [
                'id_student'   => 6,
                'id_worker'    => null,
                'id_visitor'   => null,
                'access_token' => 'cbf37e0a26541d3a59a06b7acf2382d5bd71e3bcd2ad4a463589a8dc8b825113',
                'token_hash'   => '91277605929586d63dff11958b37b50063e02d409484f4db38d55990bd4bd135',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/students/220111277/QR_students_220111277.png',
            ],
            [
                'id_student'   => 5,
                'id_worker'    => null,
                'id_visitor'   => null,
                'access_token' => '4f4fd592de1596bbc8ceb837219eb74780e4a9a47ebac672a6359a63ffffcbd0',
                'token_hash'   => '40d03298ff7438554789f93739f86acb56662f6190f6d8834bc9c156f64aa7ed',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/students/220111276/QR_students_220111276.png',
            ],
            [
                'id_student'   => 4,
                'id_worker'    => null,
                'id_visitor'   => null,
                'access_token' => '18779eb8300d0ee338b5a535c77ca8a23c6fcc528c3f79d7760c1968a251b424',
                'token_hash'   => 'f5b16cd8633a6f382a5a25d13a4336eb9c28e10eadfac8c3a515be1cdc529417',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/students/220111275/QR_students_220111275.png',
            ],
            [
                'id_student'   => 3,
                'id_worker'    => null,
                'id_visitor'   => null,
                'access_token' => '6b126941e7c7e2e6067c2ee1e543a8551d68d8b7da6635bbb4c2fc8d4d26ee6d',
                'token_hash'   => 'c9946a60d01847091ab4e8cc603af4ce34c82f31b94748b6c0645996ca01cb19',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/students/220111274/QR_students_220111274.png',
            ],
            [
                'id_student'   => 2,
                'id_worker'    => null,
                'id_visitor'   => null,
                'access_token' => 'f5e6787ddb75ce69dc7f1721edef066523804ccca2d8911ee0df19cba8208020',
                'token_hash'   => 'f0171866e685cfc2b108909aff8b9d64482d123d59267881d9b86caab655b820',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/students/220111273/QR_students_220111273.png',
            ],
            [
                'id_student'   => 1,
                'id_worker'    => null,
                'id_visitor'   => null,
                'access_token' => '6311ee8676bef9fd5a78dae8e13e68eea4d6a38032de6306d20d3e9b24cf0e78',
                'token_hash'   => '1a467374d9796a524b489347cfaaaca531e42dc9224d7fb215da2ac966f55af0',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/students/220111272/QR_students_220111272.png',
            ],

            // ----------------------------------
            // Equipo de desarrololo
            // ----------------------------------    
            [
                'id_student'   => 11,
                'id_worker'    => null,
                'id_visitor'   => null,
                'access_token' => '7090540387ef7e8378af14eaf4c2a048c416ff4fcad5dd461d6c01925d2ec65f',
                'token_hash'   => '3eae5e90423342175e55da48d5612d4ca51e68c0cd04711a981d0ab052488ea7',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/students/210111262/QR_students_210111262.svg',
            ],                    
            [
                'id_student'   => 10,
                'id_worker'    => null,
                'id_visitor'   => null,
                'access_token' => 'c9775ea90bd66744539eb2a52cd2ce07cdab9e39bbb9b11f3e75ecdeaf12fc62',
                'token_hash'   => '31d1e920bf4368322bd4d2894c59059c6a84060d84f4626ac883db00c81d2820',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/students/210110995/QR_students_210110995.svg',
            ],                    
            [
                'id_student'   => 12,
                'id_worker'    => null,
                'id_visitor'   => null,
                'access_token' => 'bbba0191b8aa1c5e790762a241b0e42cc621a30bf4dea321ea2a639f4ab34b9c',
                'token_hash'   => '660ee8c2e0caf924c374c3f0dbe29b72268abab2d9271c11202faf16c54d7499',
                'is_revoked'   => false,
                'qr_image' => 'year_2026/students/200110828/QR_students_200110828.svg',
            ],                    
        ]);
    }
}
