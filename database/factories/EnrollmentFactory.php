<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //Para reconocer la relacion con las dos tablas de cursos y estudiantes
            'student_id'  => Student::factory(),
            'course_id'   => Course::factory(),
            'enrolled_at' => fake()->dateTimeBetween('-6 months', 'now'),

        ];
    }
}
