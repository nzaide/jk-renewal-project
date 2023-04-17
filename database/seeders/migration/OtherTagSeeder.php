<?php

namespace Database\Seeders\Migration;

use App\Models\OtherTag;
use Illuminate\Database\Seeder;

class OtherTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen('storage/app/migration-data/other_tags.csv', 'r')) !== false) {
            $otherTags = [];
            $now = now();
            while (($line = fgetcsv($handle)) !== false) {
                if (is_numeric($line[0])) {
                    $otherTags[] = [
                        'id' => $line[0],
                        'name' => $line[1],
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
            fclose($handle);

            if ($otherTags) {
                OtherTag::truncate();
                OtherTag::insert($otherTags);
            }
        }
    }
}
