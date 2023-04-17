<?php

namespace Database\Seeders\Migration;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen('storage/app/migration-data/jobs.csv', 'r')) !== false) {
            $jobs = [];
            $now = now();
            while (($line = fgetcsv($handle)) !== false) {
                if (is_numeric($line[0])) {
                    $jobs[] = [
                        'id' => $line[0],
                        'name' => $line[1],
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
            fclose($handle);

            if ($jobs) {
                Job::truncate();
                Job::insert($jobs);
            }
        }
    }
}
