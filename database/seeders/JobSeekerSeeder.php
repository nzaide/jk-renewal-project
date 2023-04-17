<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JobSeekerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_seekers')->truncate();
        DB::table('job_seekers')->insert([
            [
                'id' => 1,
                'fullname' => 'JobSeeker01',
                'mail_address' => 'jobseeker01@mail.com',
                'password' => Hash::make('password'),
                'english_name' => 'JobSeeker01',
                'english_fluency' => 1,
                'language_first_id' => 1,
                'language_first_fluency' => 1,
                'language_second_id' => 2,
                'language_third_id' => 3,
                'is_blacklist' => 0,
                'gender' => 1,
                'contact_number' => '09999999999',
                'birth_date' => now(),
                'location_philippines' => 1,
                'location_abroad' => 1,
                'nationality_id' => 1,
                'visa_id' => 1,
                'marital_status' => 4,
                'profile' => 'JobSeeker01 profile',
                'other_contact' => 'other contact',
                'highest_degree' => 1,
                'education_level' => 3,
                'university_major' => 1,
                'employment_status' => 1,
                'present_employer' => 'YNS',
                'start_availability' => 'ASAP',
                'interview_availability' => 'ASAP',
                'current_salary' => '20,000',
                'expected_salary' => '20,000',
                'preferred_shift' => 'Morning',
                'resignation_reason' => 'Lack of opportunity',
                'preferred_employment' => 2,
                'pending_application' => 'None',
                'job_posting' => 'IT',
                'interviewer' => 'HR',
                'reactivation_date' => now(),
                'interview_date' => now(),
                'status' => 1
            ],
            [
                'id' => 2,
                'fullname' => 'JobSeeker02',
                'mail_address' => 'jobseeker02@mail.com',
                'password' => Hash::make('password'),
                'english_name' => 'JobSeeker02',
                'english_fluency' => 1,
                'language_first_id' => 1,
                'language_first_fluency' => 1,
                'language_second_id' => 2,
                'language_third_id' => 3,
                'is_blacklist' => 0,
                'gender' => 1,
                'contact_number' => '09999999999',
                'birth_date' => now(),
                'location_philippines' => 1,
                'location_abroad' => 1,
                'nationality_id' => 1,
                'visa_id' => 1,
                'marital_status' => 4,
                'profile' => 'JobSeeker02 profile',
                'other_contact' => 'other contact',
                'highest_degree' => 1,
                'education_level' => 3,
                'university_major' => 1,
                'employment_status' => 1,
                'present_employer' => 'YNS',
                'start_availability' => 'ASAP',
                'interview_availability' => 'ASAP',
                'current_salary' => '20,000',
                'expected_salary' => '20,000',
                'preferred_shift' => 'Morning',
                'resignation_reason' => 'Lack of opportunity',
                'preferred_employment' => 2,
                'pending_application' => 'None',
                'job_posting' => 'IT',
                'interviewer' => 'HR',
                'reactivation_date' => now(),
                'interview_date' => now(),
                'status' => 1
            ],
            [
                'id' => 3,
                'fullname' => 'JobSeeker03',
                'mail_address' => 'jobseeker03@mail.com',
                'password' => Hash::make('password'),
                'english_name' => 'JobSeeker03',
                'english_fluency' => 1,
                'language_first_id' => 1,
                'language_first_fluency' => 1,
                'language_second_id' => 2,
                'language_third_id' => 3,
                'is_blacklist' => 0,
                'gender' => 1,
                'contact_number' => '09999999999',
                'birth_date' => now(),
                'location_philippines' => 1,
                'location_abroad' => 1,
                'nationality_id' => 1,
                'visa_id' => 1,
                'marital_status' => 4,
                'profile' => 'JobSeeker03 profile',
                'other_contact' => 'other contact',
                'highest_degree' => 1,
                'education_level' => 3,
                'university_major' => 1,
                'employment_status' => 1,
                'present_employer' => 'YNS',
                'start_availability' => 'ASAP',
                'interview_availability' => 'ASAP',
                'current_salary' => '20,000',
                'expected_salary' => '20,000',
                'preferred_shift' => 'Morning',
                'resignation_reason' => 'Lack of opportunity',
                'preferred_employment' => 2,
                'pending_application' => 'None',
                'job_posting' => 'IT',
                'interviewer' => 'HR',
                'reactivation_date' => now(),
                'interview_date' => now(),
                'status' => 1
            ],
            [
                'id' => 4,
                'fullname' => 'JobSeeker04',
                'mail_address' => 'jobseeker04@mail.com',
                'password' => Hash::make('password'),
                'english_name' => 'JobSeeker04',
                'english_fluency' => 1,
                'language_first_id' => 1,
                'language_first_fluency' => 1,
                'language_second_id' => 2,
                'language_third_id' => 3,
                'is_blacklist' => 0,
                'gender' => 1,
                'contact_number' => '09999999999',
                'birth_date' => now(),
                'location_philippines' => 1,
                'location_abroad' => 1,
                'nationality_id' => 1,
                'visa_id' => 1,
                'marital_status' => 4,
                'profile' => 'JobSeeker04 profile',
                'other_contact' => 'other contact',
                'highest_degree' => 1,
                'education_level' => 3,
                'university_major' => 1,
                'employment_status' => 1,
                'present_employer' => 'YNS',
                'start_availability' => 'ASAP',
                'interview_availability' => 'ASAP',
                'current_salary' => '20,000',
                'expected_salary' => '20,000',
                'preferred_shift' => 'Morning',
                'resignation_reason' => 'Lack of opportunity',
                'preferred_employment' => 2,
                'pending_application' => 'None',
                'job_posting' => 'IT',
                'interviewer' => 'HR',
                'reactivation_date' => now(),
                'interview_date' => now(),
                'status' => 1
            ],
            [
                'id' => 5,
                'fullname' => 'JobSeeker05',
                'mail_address' => 'jobseeker05@mail.com',
                'password' => Hash::make('password'),
                'english_name' => 'JobSeeker05',
                'english_fluency' => 1,
                'language_first_id' => 1,
                'language_first_fluency' => 1,
                'language_second_id' => 2,
                'language_third_id' => 3,
                'is_blacklist' => 0,
                'gender' => 1,
                'contact_number' => '09999999999',
                'birth_date' => now(),
                'location_philippines' => 1,
                'location_abroad' => 1,
                'nationality_id' => 1,
                'visa_id' => 1,
                'marital_status' => 4,
                'profile' => 'JobSeeker05 profile',
                'other_contact' => 'other contact',
                'highest_degree' => 1,
                'education_level' => 3,
                'university_major' => 1,
                'employment_status' => 1,
                'present_employer' => 'YNS',
                'start_availability' => 'ASAP',
                'interview_availability' => 'ASAP',
                'current_salary' => '20,000',
                'expected_salary' => '20,000',
                'preferred_shift' => 'Morning',
                'resignation_reason' => 'Lack of opportunity',
                'preferred_employment' => 2,
                'pending_application' => 'None',
                'job_posting' => 'IT',
                'interviewer' => 'HR',
                'reactivation_date' => now(),
                'interview_date' => now(),
                'status' => 1
            ]
        ]);
    }
}
