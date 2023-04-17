<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPostLanguagePreference>
 */
class JobPostLanguagePreferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'job_post_id' => $this->faker->unique( )->numberBetween(1, 500),
            'language_id' => rand(1, 20),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
