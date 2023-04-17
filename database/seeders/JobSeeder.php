<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        DB::table('jobs')->truncate();
        DB::table('jobs')->insert([
            [
                'id' => 1,
                'name' => 'Account Manager',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Accounting/Auditing',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Accounts Payable',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'Administrative',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'name' => 'Advertising',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'name' => 'Airline',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'name' => 'Any positions available',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'name' => 'AutoCAD Operator',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'name' => 'Banking/Finance',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'name' => 'Business',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 11,
                'name' => 'Business Development Manager',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 12,
                'name' => 'Business owner',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 13,
                'name' => 'Cabin Crew / Steward',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 14,
                'name' => 'Casino',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 15,
                'name' => 'Communications',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 16,
                'name' => 'Computer hardware',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 17,
                'name' => 'Computer software',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 18,
                'name' => 'Consulting',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 19,
                'name' => 'Customer service and call center/ CSR',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 20,
                'name' => 'Customs',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 21,
                'name' => 'Draftsman',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 22,
                'name' => 'ESL Teacher',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 23,
                'name' => 'Economics',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 24,
                'name' => 'Education',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 25,
                'name' => 'Engineering',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 26,
                'name' => 'Entertainer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 27,
                'name' => 'Financial',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 28,
                'name' => 'Finished Artist',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 29,
                'name' => 'General Accountant',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 30,
                'name' => 'Government',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 31,
                'name' => 'Graphic Artist',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 32,
                'name' => 'Graphic Design',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 33,
                'name' => 'Graphic Designer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 34,
                'name' => 'Healthcare',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 35,
                'name' => 'Hotel',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 36,
                'name' => 'Human resource',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 37,
                'name' => 'Inbound Sales Agent',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 38,
                'name' => 'Information technology',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 39,
                'name' => 'Interpreter',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 40,
                'name' => 'JAVA',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 41,
                'name' => 'Legal',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 42,
                'name' => 'Linux Support Engineer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 43,
                'name' => 'Logistic Admin',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 44,
                'name' => 'Logistics',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 45,
                'name' => 'Managerial',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 46,
                'name' => 'Manufacturing',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 47,
                'name' => 'Marketing',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 48,
                'name' => 'NOC Engineer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 49,
                'name' => 'Network Administrator',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 50,
                'name' => 'Network Engineer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 51,
                'name' => 'Nursing',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 52,
                'name' => 'OFW(overseas Filipino Worker)',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 53,
                'name' => 'Online Gaming-NO',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 54,
                'name' => 'Online Gaming-YES',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 55,
                'name' => 'Outbound Sales Agent',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 56,
                'name' => 'Process Analyst',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 57,
                'name' => 'Programmer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 58,
                'name' => 'QA',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 59,
                'name' => 'Quality Assurance Engineer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 60,
                'name' => 'Quality Control',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 61,
                'name' => 'Real Estate',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 62,
                'name' => 'Restaurant and Food service',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 63,
                'name' => 'Safety Officer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 64,
                'name' => 'Sales',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 65,
                'name' => 'Site Engineer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 66,
                'name' => 'Software Cloud Operations Analyst',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 67,
                'name' => 'Software Developer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 68,
                'name' => 'Software Quality Assurance',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 69,
                'name' => 'Taxation',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 70,
                'name' => 'Teacher',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 71,
                'name' => 'Technical Support Engineer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 72,
                'name' => 'Technical Support/ TSR',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 73,
                'name' => 'Tourism',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 74,
                'name' => 'Translations',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 75,
                'name' => 'Travel',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 76,
                'name' => 'Web Designer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
