<?php

namespace Database\Factories;

use App\Models\EvalReply;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EvalReply>
 */
class EvalReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $number = 1;
        return [
            'eval_id'=> $number++,
            'department_id' => fake()->numberBetween(1,8),
            'naked_reply_details' => fake()->text(500),
            'filtered_reply_details' => fake()->text(500),
        ];
    }
}
