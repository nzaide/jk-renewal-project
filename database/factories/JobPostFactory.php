<?php

namespace Database\Factories;

use App\Enums\JobPostStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPost>
 */
class JobPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'job_number' => Str::random(10),
            'status' => rand(1, 3),
            'salary' => Str::random(10),
            'job_name_en' => Str::random(10),
            'industry_en' => Str::random(10),
            'location_en' => Str::random(10),
            'benefits_en' => Str::random(10),
            'details_en' => Str::random(10),
            'job_name_jp' => Str::random(10),
            'industry_jp' => Str::random(10),
            'location_jp' => Str::random(10),
            'benefits_jp' => Str::random(10),
            'details_jp' => Str::random(10),
            'job_name_kr' => Str::random(10),
            'industry_kr' => Str::random(10),
            'location_kr' => Str::random(10),
            'benefits_kr' => Str::random(10),
            'details_kr' => Str::random(10),
            'job_name_cn' => Str::random(10),
            'industry_cn' => Str::random(10),
            'location_cn' => Str::random(10),
            'benefits_cn' => Str::random(10),
            'details_cn' => Str::random(10),
            'post_start_date' => Carbon::now()->addWeeks(-1),
            'post_end_date' => Carbon::now()->addWeeks(2),
            'display_status' => rand(1, 2),
            'target' => rand(1, 3),
            'group_id' => rand(1, 5),
            'admin_id' => rand(1, 5),
            'heads_needed' => Str::random(10),
            'work_arrangement' => Str::random(10),
            'tracker_url' => Str::random(10),
            'company_name' => Str::random(10),
            'position' => Str::random(10),
            'language_fluency' => Str::random(10),
            'schedule' => Str::random(10),
            'visa' => Str::random(10),
            'education' => Str::random(10),
            'age' => Str::random(10),
            'gender' => Str::random(10),
            'experience' => Str::random(10),
            'abroad' => Str::random(10),
            'website' => Str::random(10),
            'interview_schedule' => Str::random(10),
            'job_description' => Str::random(10),
            'job_description_jp' => Str::random(10),
            'job_post_jp' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }
}
