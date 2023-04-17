<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_role_id' => fake()->numberBetween(1,3),
            'company_name' => fake()->company,
            'email' => fake()->companyEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'business_domain_id' => fake()->numberBetween(1,14),
            'business_domain_detail_id' => fake()->numberBetween(1,70),
            'prefecture_id' => fake()->numberBetween(1,47),
            'company_address' => fake()->address,
            'url' => fake()->url,
            'president_name' => fake()->firstName,
            'capital' => fake()->text(10),
            'classification' => fake()->text(10),
            'established_date' => fake()->date,
            'number_of_employees' => fake()->numberBetween(1,100),
            'business_details' => fake()->text(50),
            'abstract' => fake()->text(50),
            'business_service' => fake()->text(50),
            'vision_mission' =>fake()->text(50),
            'benefit_package' => fake()->text(100),
            'image_path' => fake()->imageUrl,
            'hot_flag' => fake()->numberBetween(0,1)
        ];
    }
}
