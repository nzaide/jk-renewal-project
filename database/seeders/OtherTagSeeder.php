<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtherTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        DB::table('other_tags')->truncate();
        DB::table('other_tags')->insert([
            [
                'id' => 1,
                'name' => 'Area-Alabang',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Area-BGC, Taguig City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Area-Batangas',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'Area-Bulacan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'name' => 'Area-Cavite',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'name' => 'Area-Cebu',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'name' => 'Area-Davao',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'name' => 'Area-Laguna',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'name' => 'Area-Makati City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'name' => 'Area-Manila',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 11,
                'name' => 'Area-Mckinley Hill, Taguig City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 12,
                'name' => 'Area-Ortigas, Pasig City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 13,
                'name' => 'Area-Pampanga',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 14,
                'name' => 'Area-Parañaque City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 15,
                'name' => 'Area-Pasay City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 16,
                'name' => 'Area-Quezon City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 17,
                'name' => 'Area-Zambales (Subic/Olongapo)',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 18,
                'name' => 'Half: Thai-Vietnamese',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 19,
                'name' => 'Half: American-Thai',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 20,
                'name' => 'Half: Filipino-Chinese',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 21,
                'name' => 'Half: Filipino-German',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 22,
                'name' => 'Half: Filipino-Italian',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 23,
                'name' => 'Half: Filipino-Japanese',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 24,
                'name' => 'Half: Filipino-Korean',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 25,
                'name' => 'Half: Filipino-Spanish',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 26,
                'name' => 'Half: Filipino-Thai',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 27,
                'name' => 'loc-Alabang',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 28,
                'name' => 'loc-All Metro Manila',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 29,
                'name' => 'loc-BGC, Taguig City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 30,
                'name' => 'loc-Batangas',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 31,
                'name' => 'loc-Bulacan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 32,
                'name' => 'loc-Cavite',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 33,
                'name' => 'loc-Cebu',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 34,
                'name' => 'loc-Davao',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 35,
                'name' => 'loc-Laguna',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 36,
                'name' => 'loc-Makati City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 37,
                'name' => 'loc-Manila',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 38,
                'name' => 'loc-Mckinley Hill, Taguig City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 39,
                'name' => 'loc-Ortigas, Pasig City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 40,
                'name' => 'loc-Pampanga',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 41,
                'name' => 'loc-Parañaque City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 42,
                'name' => 'loc-Pasay City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 43,
                'name' => 'loc-Quezon City',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 44,
                'name' => 'loc-Zambales (Subic/Olongapo)',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
