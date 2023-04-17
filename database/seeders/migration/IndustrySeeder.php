<?php

namespace Database\Seeders\Migration;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen('storage/app/migration-data/industries.csv', 'r')) !== false) {
            $industries = [];
            $now = now();
            while (($line = fgetcsv($handle)) !== false) {
                if (is_numeric($line[0])) {
                    $industries[] = [
                        'id' => $line[0],
                        'name' => $line[1],
                        'parent_id' => isset($line[2]) ? $line[2] : null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
            fclose($handle);

            if ($industries) {
                Industry::truncate();
                Industry::insert($industries);
            }
        }
    }
}
