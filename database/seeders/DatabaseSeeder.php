<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Income;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ---------- > Seeder
        $this->call(UserSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(OfferSeeder::class);
        $this->call(WorkerSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(VisitorSeeder::class);
        $this->call(IncomeSeeder::class);
        $this->call(CodeqrSeeder::class);
    }
}
