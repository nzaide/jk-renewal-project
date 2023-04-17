<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluation>
 */
class EvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1,2),
            'company_id' =>  fake()->numberBetween(1,50),
            'genre_id' => fake()->numberBetween(1,4),
            'degree_id' => fake()->numberBetween(1,5),
            'naked_details' => fake()->text(500),
            'filtered_details' => fake()->text(100),
            'hot_flag' => fake()->numberBetween(0,1),

        ];
    }
}
