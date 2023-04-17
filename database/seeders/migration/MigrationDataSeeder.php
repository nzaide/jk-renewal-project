<?php

namespace Database\Seeders\Migration;

use Illuminate\Database\Seeder;

class MigrationDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GroupSeeder::class,
            IndustrySeeder::class,
            JobFieldSeeder::class,
            JobPostSeeder::class,
            JobSeeder::class,
            LanguageSeeder::class,
            LicenseSeeder::class,
            LocationSeeder::class,
            NationalitySeeder::class,
            OtherTagSeeder::class,
            JobSeekerSeeder::class,
        ]);
    }
}
