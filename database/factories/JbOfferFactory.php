<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JbOffer>
 */
class JbOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jb_offer_title' => fake()->jobTitle,
            'company_id' => fake()->numberBetween(1,50),
            'business_domain_id' => fake()->numberBetween(1,14),
            'occupation_id' => fake()->numberBetween(1,12),
            'prefecture_id' => fake()->numberBetween(1,47),
            'offer_details' => fake()->text(50),
            'basic_information' =>fake()->text(50),
            'application_details'=> fake()->text(50),
            'post_flg' => fake()->numberBetween(0,1),
            'post_date' =>fake()->dateTimeThisMonth(),
            'views' => fake()->numberBetween(0,1000),
        ];
    }
}
