<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->date('Y-m-d');
        $end = fake()->dateTimeBetween($start, '+3 months')->format('Y-m-d');

        return [

            'title' =>fake()->jobTitle(),
            'description'=>fake()->sentence(),
            'start_date'=>$start,
            'end_date'=>$end,

        ];
    }
}
