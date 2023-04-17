<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'job_post_id' => rand(1, 50),
            'admin_id' => rand(1, 50),
            'job_seeker_id' => rand(1, 5),
            'applied_date' => now(),
            'application_status' => rand(1, 13),
            'final_remarks' => $this->faker->text(50),
            'created_at' => now(),
            'created_at' => now()
        ];
    }
}
