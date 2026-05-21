<?php
namespace Database\Seeders;

use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('TRUNCATE TABLE incomes RESTART IDENTITY CASCADE');

        DB::table('incomes')->insert([
            [
                'con_worker'     => 1,
                'con_student'    => null,
                'con_visitor'    => null,
                'id_worker'  => 1,
                'id_student' => null,
                'id_visitor' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'con_worker'     => null,
                'con_student'    => 1,
                'con_visitor'    => null,
                'id_worker'  => null,
                'id_student' => 2,
                'id_visitor' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'con_worker'     => null,
                'con_student'    => null,
                'con_visitor'    => 1,
                'id_worker'  => null,
                'id_student' => null,
                'id_visitor' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Income::factory()->count(1000)->withDateRange('2026-02-02', '2026-02-08')->create();
        // Income::factory()->count(1000)->withDateRange('2026-02-09', '2026-02-15')->create();
        // Income::factory()->count(1000)->withDateRange('2026-02-16', '2026-02-22')->create();
        // Income::factory()->count(1000)->withDateRange('2026-02-23', '2026-02-29')->create();
        // Income::factory()->count(1000)->withDateRange('2026-03-02', '2026-03-08')->create();
        // Income::factory()->count(1000)->withDateRange('2026-03-09', '2026-03-15')->create();
        // Income::factory()->count(1000)->withDateRange('2026-03-16', '2026-03-22')->create();
        // Income::factory()->count(1000)->withDateRange('2026-03-23', '2026-03-29')->create();
        // Income::factory()->count(1000)->withDateRange('2026-03-30', '2026-04-05')->create();
        // Income::factory()->count(1000)->withDateRange('2026-04-06', '2026-04-12')->create();
        // Income::factory()->count(1000)->withDateRange('2026-04-13', '2026-04-19')->create();
        Income::factory()->count(10)->withDateRange('2026-04-13', '2026-04-19')->create();
    }
}
