<?php

namespace Database\Seeders\Migration;

use App\Models\Nationality;
use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen('storage/app/migration-data/nationalities.csv', 'r')) !== false) {
            $nationalities = [];
            $now = now();
            while (($line = fgetcsv($handle)) !== false) {
                if (is_numeric($line[0])) {
                    $nationalities[] = [
                        'id' => $line[0],
                        'nationality' => $line[1],
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
            fclose($handle);

            if ($nationalities) {
                Nationality::truncate();
                Nationality::insert($nationalities);
            }
        }
    }
}
