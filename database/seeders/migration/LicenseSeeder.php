<?php

namespace Database\Seeders\Migration;

use App\Models\License;
use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen('storage/app/migration-data/licenses.csv', 'r')) !== false) {
            $licenses = [];
            $now = now();
            while (($line = fgetcsv($handle)) !== false) {
                if (is_numeric($line[0])) {
                    $licenses[] = [
                        'id' => $line[0],
                        'name' => $line[1],
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
            fclose($handle);

            if ($licenses) {
                License::truncate();
                License::insert($licenses);
            }
        }
    }
}
