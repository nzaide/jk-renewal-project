<?php

namespace Database\Seeders\Migration;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen('storage/app/migration-data/groups.csv', 'r')) !== false) {
            $groups = [];
            $now = now();
            while (($line = fgetcsv($handle)) !== false) {
                if (is_numeric($line[0])) {
                    $groups[] = [
                        'id' => $line[0],
                        'name' => $line[1],
                        'sender_name' => $line[2],
                        'mail_address' => $line[3],
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
            fclose($handle);

            if ($groups) {
                Group::truncate();
                Group::insert($groups);
            }
        }
    }
}
