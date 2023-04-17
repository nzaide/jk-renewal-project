<?php

namespace Database\Seeders\Migration;

use App\Models\JobField;
use Illuminate\Database\Seeder;

class JobFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen('storage/app/migration-data/job_fields.csv', 'r')) !== false) {
            $jobFields = [];
            $now = now();
            while (($line = fgetcsv($handle)) !== false) {
                if (is_numeric($line[0])) {
                    $jobFields[] = [
                        'id' => $line[0],
                        'name' => $line[1],
                        'parent_id' => isset($line[2]) ? $line[2] : null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
            fclose($handle);

            if ($jobFields) {
                JobField::truncate();
                JobField::insert($jobFields);
            }
        }
    }
}
