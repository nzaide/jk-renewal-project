<?php

namespace Database\Seeders\Migration;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen('storage/app/migration-data/languages.csv', 'r')) !== false) {
            $languages = [];
            $now = now();
            while (($line = fgetcsv($handle)) !== false) {
                if (is_numeric($line[0])) {
                    $languages[] = [
                        'id' => $line[0],
                        'language' => $line[1],
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
            fclose($handle);

            if ($languages) {
                Language::truncate();
                Language::insert($languages);
            }
        }
    }
}
