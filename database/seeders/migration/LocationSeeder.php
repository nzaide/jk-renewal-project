<?php

namespace Database\Seeders\Migration;

use App\Enums\LocationType;
use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [];
        $now = now();
        // Philippine
        if (($handle = fopen('storage/app/migration-data/philippine_locations.csv', 'r')) !== false) {
            while (($line = fgetcsv($handle)) !== false) {
                if (is_numeric($line[0])) {
                    $locations[] = [
                        'id' => count($locations) + 1,
                        'location' => $line[1],
                        'type' => LocationType::Philippines,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
            fclose($handle);
        }
        // Abroad
        if (($handle = fopen('storage/app/migration-data/abroad_locations.csv', 'r')) !== false) {
            while (($line = fgetcsv($handle)) !== false) {
                if (is_numeric($line[0])) {
                    $locations[] = [
                        'id' => count($locations) + 1,
                        'location' => $line[1],
                        'type' => LocationType::Abroad,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
            fclose($handle);
        }

        if ($locations) {
            Location::truncate();
            Location::insert($locations);
        }
    }
}
