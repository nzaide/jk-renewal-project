<?php

namespace Database\Seeders;

use App\Models\JobPostLanguagePreference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPostLanguagePreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_post_language_preferences')->truncate();
        JobPostLanguagePreference::factory()->count(500)->create();
    }
}
