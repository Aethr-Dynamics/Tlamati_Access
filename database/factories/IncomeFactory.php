<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Worker;
use App\Models\Student;
use App\Models\Visitor;

class IncomeFactory extends Factory
{
    public function definition(): array
    {
        $type = $this->faker->randomElement(['worker', 'student', 'visitor']);

        return [
            'worker'  => $type === 'worker' ? 1 : null,
            'student' => $type === 'student' ? 1 : null,
            'visitor' => $type === 'visitor' ? 1 : null,
            
            'id_worker'  => $type === 'worker' ? Worker::inRandomOrder()->value('id_worker') : null,
            'id_student' => $type === 'student' ? Student::inRandomOrder()->value('id_student') : null,
            'id_visitor' => $type === 'visitor' ? Visitor::inRandomOrder()->value('id_visitor') : null,

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function withDateRange($start, $end)
    {
        return $this->state(function () use ($start, $end) {
            $date = $this->faker->dateTimeBetween($start, $end);

            return [
                'created_at' => $date,
                'updated_at' => $date,
            ];
        });
    }
}