<?php

namespace Database\Seeders\Migration;

use App\Enums\{
    EmploymentStatus,
    EmploymentType,
    EnglishFluency,
    GraduateLevel,
    HighestDegree,
    HighschoolLevel,
    JapaneseFluency,
    JobSeekerGender,
    JobSeekerStatus,
    KoreanFluency,
    MandarinFluency,
    MaritalStatus,
    OtherFluency,
    UndergraduateLevel,
    UniversityMajor,
    Visa,
};
use App\Models\{
    Industry,
    Job,
    JobField,
    JobSeeker,
    JobSeekerIndustryPreference,
    JobSeekerJobFieldPreference,
    JobSeekerJobPreference,
    JobSeekerLicensePreference,
    JobSeekerLocationPreference,
    JobSeekerOtherTagPreference,
    Language,
    License,
    Location,
    OtherTag,
    Nationality,
};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeekerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chunkSize = 1000;
        $i = 1;
        $now = now();

        // Job seeker data and login data are in seperate tables in the old db
        // Handle job seeker data
        echo "Beggining import from `zdata_jobseeker` table...\n";
        $isZdataJobseekersNotEmpty = DB::connection('mysql2')
            ->table('zdata_jobseeker')
            ->leftJoin('wp0_users', 'zdata_jobseeker.email', '=', 'wp0_users.user_email')
            ->select()
            ->exists();
        if ($isZdataJobseekersNotEmpty) {
            JobSeeker::truncate();
            JobSeekerIndustryPreference::truncate();
            JobSeekerJobFieldPreference::truncate();
            JobSeekerJobPreference::truncate();
            JobSeekerLicensePreference::truncate();
            JobSeekerLocationPreference::truncate();
            JobSeekerOtherTagPreference::truncate();
            $chunkNo = 1;

            DB::connection('mysql2')
                ->table('zdata_jobseeker')
                ->leftJoin('wp0_users', 'zdata_jobseeker.email', '=', 'wp0_users.user_email')
                ->orderBy('zdata_jobseeker.id')
                ->chunk($chunkSize, function ($zdataJobseekers) use (&$chunkNo, &$i, $now) {
                    $jobSeekers = [];
                    $industryPreferences = [];
                    $jobFieldPreferences = [];
                    $jobPreferences = [];
                    $licensePreferences = [];
                    $locationPreferences = [];
                    $otherTagPreferences = [];
                    foreach ($zdataJobseekers as $zdataJobseeker) {
                        // Format some of the data
                        $interviewDate = $zdataJobseeker->ryear ? implode('-', [$zdataJobseeker->ryear, $zdataJobseeker->rmon, $zdataJobseeker->rday]) : null;
                        $birthDate = $zdataJobseeker->byear ? implode('-', [$zdataJobseeker->byear, $zdataJobseeker->bmon, $zdataJobseeker->bday]) : null;
                        $reactivationDate = $zdataJobseeker->lcyear ? implode('-', [$zdataJobseeker->lcyear, $zdataJobseeker->lcmon, $zdataJobseeker->lcday]) : null;

                        $nationalityId = Nationality::where('nationality', $zdataJobseeker->nationality)->first()?->id;
                        $languageFirstId = Language::where('language', $zdataJobseeker->lang1st)->first()?->id;
                        $languageSecondId = Language::where('language', $zdataJobseeker->lang2nd)->first()?->id;
                        $languageThirdId = Language::where('language', $zdataJobseeker->lang3rd)->first()?->id;

                        $languageFirstFluency = $zdataJobseeker->lang1st_lv ?
                            $this->getEnumValFromText(
                                $this->getLanguageFluencyCases($zdataJobseeker->lang1st),
                                $zdataJobseeker->lang1st_lv
                            ) :
                            null;
                        $languageSecondFluency = $zdataJobseeker->lang2nd_lv ?
                            $this->getEnumValFromText(
                                $this->getLanguageFluencyCases($zdataJobseeker->lang2nd),
                                $zdataJobseeker->lang2nd_lv
                            ) :
                        null;
                        $languageThirdFluency = $zdataJobseeker->lang3rd_lv ?
                            $this->getEnumValFromText(
                                $this->getLanguageFluencyCases($zdataJobseeker->lang3rd),
                                $zdataJobseeker->lang3rd_lv
                            ) :
                            null;

                        $englishFluency = $zdataJobseeker->en_fluency ? $this->getEnumValFromText(EnglishFluency::cases(), $zdataJobseeker->en_fluency) : null;
                        $employmentStatus = $zdataJobseeker->status ? $this->getEnumValFromText(EmploymentStatus::cases(), $zdataJobseeker->status) : null;
                        $gender = $zdataJobseeker->gender ? $this->getEnumValFromText(JobSeekerGender::cases(), $zdataJobseeker->gender) : null;
                        $highestDegree = $zdataJobseeker->education ? $this->getEnumValFromText(HighestDegree::cases(), $zdataJobseeker->education) : null;
                        $universityMajor = $zdataJobseeker->major ? $this->getEnumValFromText(UniversityMajor::cases(), $zdataJobseeker->major) : null;
                        $visa = $zdataJobseeker->latest_status ? $this->getEnumValFromText(Visa::cases(), $zdataJobseeker->latest_status) : null;
                        $maritalStatus = $zdataJobseeker->marital_status ? $this->getEnumValFromText(MaritalStatus::cases(), $zdataJobseeker->marital_status) : null;
                        $preferredEmployment = $zdataJobseeker->em_preferences ? $this->getEnumValFromText(EmploymentType::cases(), $zdataJobseeker->em_preferences) : null;
                        $educationLevel = $zdataJobseeker->edu_sub ? $this->getEnumValFromText(
                            array_merge(GraduateLevel::cases(), HighschoolLevel::cases(), UndergraduateLevel::cases()),
                            $zdataJobseeker->edu_sub
                        ) : null;

                        $jobSeekers[] = [
                            'id' => $i,
                            'interview_date' => $interviewDate,
                            'fullname' => $zdataJobseeker->fullname,
                            'english_name' => $zdataJobseeker->enname,
                            'nationality_id' => $nationalityId,
                            'language_first_id' => $languageFirstId,
                            'language_second_id' => $languageSecondId,
                            'language_third_id' => $languageThirdId,
                            'language_first_fluency' => $languageFirstFluency,
                            'language_second_fluency' => $languageSecondFluency,
                            'language_third_fluency' => $languageThirdFluency,
                            'language_second_speaking' => $zdataJobseeker->lang2nd_s,
                            'language_second_reading' => $zdataJobseeker->lang2nd_r,
                            'language_second_writing' => $zdataJobseeker->lang2nd_w,
                            'language_third_speaking' => $zdataJobseeker->lang3rd_s,
                            'language_third_reading' => $zdataJobseeker->lang3rd_r,
                            'language_third_writing' => $zdataJobseeker->lang3rd_w,
                            'english_fluency' => $englishFluency,
                            'mail_address' => $zdataJobseeker->email,
                            'password' => $zdataJobseeker->user_pass ?: '',
                            'contact_number' => $zdataJobseeker->tel,
                            'landline' => $zdataJobseeker->tel_land,
                            'social_media' => $zdataJobseeker->skype,
                            'employment_status' => $employmentStatus,
                            'gender' => $gender,
                            'birth_date' => $birthDate,
                            'highest_degree' => $highestDegree,
                            'university_major' => $universityMajor,
                            'present_employer' => $zdataJobseeker->pre_employer,
                            'current_salary' => $zdataJobseeker->salary_current,
                            'expected_salary' => $zdataJobseeker->salary_expected,
                            'resignation_reason' => $zdataJobseeker->reason,
                            'pending_application' => $zdataJobseeker->pending_app,
                            'start_availability' => $zdataJobseeker->avail_start,
                            'interview_availability' => $zdataJobseeker->avail_interview,
                            'preferred_shift' => $zdataJobseeker->prefer_shift,
                            'job_posting' => $zdataJobseeker->jobs_posting,
                            'profile' => $zdataJobseeker->comment,
                            'interviewer' => $zdataJobseeker->interviewer,
                            'complete_blind_resume' => $zdataJobseeker->biofile,
                            'deleted_at' => $zdataJobseeker->disabled_ymdhms ?: null,
                            'reactivation_date' => $reactivationDate,
                            'visa_id' => $visa,
                            'other_contact' => $zdataJobseeker->endorsed_to,
                            'marital_status' => $maritalStatus,
                            'blind_resume' => $zdataJobseeker->biofile2,
                            'preferred_employment' => $preferredEmployment,
                            'education_level' => $educationLevel,
                            'is_blacklist' => $zdataJobseeker->blacklist,
                            'status' => JobSeekerStatus::FullyRegistered,
                            'email_verified_at' => $now,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ];

                        // Set the preferences
                        if ($zdataJobseeker->industry_d) {
                            $industries = str_replace('&gt', "\n", $zdataJobseeker->industry_d);
                            $industryIds = Industry::whereIn('name', explode("\n", $industries))->pluck('id');
                            foreach ($industryIds as $industryId) {
                                $industryPreferences[] = [
                                    'job_seeker_id' => $i,
                                    'industry_id' => $industryId,
                                    'created_at' => $now,
                                    'updated_at' => $now,
                                ];
                            }
                        }
                        if ($zdataJobseeker->experiences_d) {
                            $jobFields = str_replace('>', "\n", $zdataJobseeker->experiences_d);
                            $jobFieldIds = JobField::whereIn('name', explode("\n", $jobFields))->pluck('id');
                            foreach ($jobFieldIds as $jobFieldId) {
                                $jobFieldPreferences[] = [
                                    'job_seeker_id' => $i,
                                    'job_field_id' => $jobFieldId,
                                    'created_at' => $now,
                                    'updated_at' => $now,
                                ];
                            }
                        }
                        if ($zdataJobseeker->prefer_jobs) {
                            $jobIds = Job::whereIn('name', explode("\n", $zdataJobseeker->prefer_jobs))->pluck('id');
                            foreach ($jobIds as $jobId) {
                                $jobPreferences[] = [
                                    'job_seeker_id' => $i,
                                    'job_id' => $jobId,
                                    'created_at' => $now,
                                    'updated_at' => $now,
                                ];
                            }
                        }
                        if ($zdataJobseeker->licenses_certificate) {
                            $licenseIds = License::whereIn('name', explode("\n", $zdataJobseeker->licenses_certificate))->pluck('id');
                            foreach ($licenseIds as $licenseId) {
                                $licensePreferences[] = [
                                    'job_seeker_id' => $i,
                                    'license_id' => $licenseId,
                                    'created_at' => $now,
                                    'updated_at' => $now,
                                ];
                            }
                        }
                        if ($zdataJobseeker->location) {
                            $locationIds = Location::whereIn('location', explode("\n", $zdataJobseeker->location))->pluck('id');
                            foreach ($locationIds as $locationId) {
                                $locationPreferences[] = [
                                    'job_seeker_id' => $i,
                                    'location_id' => $locationId,
                                    'created_at' => $now,
                                    'updated_at' => $now,
                                ];
                            }
                        }
                        if ($zdataJobseeker->location_abroad) {
                            $locationIds = Location::whereIn('location', explode("\n", $zdataJobseeker->location_abroad))->pluck('id');
                            foreach ($locationIds as $locationId) {
                                $locationPreferences[] = [
                                    'job_seeker_id' => $i,
                                    'location_id' => $locationId,
                                    'created_at' => $now,
                                    'updated_at' => $now,
                                ];
                            }
                        }
                        if ($zdataJobseeker->other_tags) {
                            $otherTagIds = OtherTag::whereIn('name', explode("\n", $zdataJobseeker->other_tags))->pluck('id');
                            foreach ($otherTagIds as $otherTagId) {
                                $otherTagPreferences[] = [
                                    'job_seeker_id' => $i,
                                    'other_tag_id' => $otherTagId,
                                    'created_at' => $now,
                                    'updated_at' => $now,
                                ];
                            }
                        }
                        $i++;
                    }

                    JobSeeker::insert($jobSeekers);
                    JobSeekerIndustryPreference::insert($industryPreferences);
                    JobSeekerJobFieldPreference::insert($jobFieldPreferences);
                    JobSeekerJobPreference::insert($jobPreferences);
                    JobSeekerLicensePreference::insert($licensePreferences);
                    JobSeekerLocationPreference::insert($locationPreferences);
                    JobSeekerOtherTagPreference::insert($otherTagPreferences);

                    echo 'Chunk ' . $chunkNo . ' completed. Total job seekers inserted: ' . ($i - 1) . "\n";
                    $chunkNo++;
                });
        }
        echo "Finished importing from `zdata_jobseeker` table.\n";

        // Handle login data
        echo "Beggining import from `wp0_users` table...\n";
        $isWp0UsersNotEmpty = DB::connection('mysql2')
            ->table('wp0_users')
            ->leftJoin('zdata_jobseeker', 'wp0_users.user_email', '=', 'zdata_jobseeker.email')
            ->whereNull('zdata_jobseeker.email')
            ->select()
            ->exists();
        if ($isWp0UsersNotEmpty) {
            if (!$isZdataJobseekersNotEmpty) {
                JobSeeker::truncate();
            }
            $chunkNo = 1;

            DB::connection('mysql2')
                ->table('wp0_users')
                ->leftJoin('zdata_jobseeker', 'wp0_users.user_email', '=', 'zdata_jobseeker.email')
                ->whereNull('zdata_jobseeker.email')
                ->orderBy('wp0_users.id')
                ->chunk($chunkSize, function ($wp0Users) use (&$chunkNo, &$i, $now) {
                    $jobSeekers = [];
                    foreach ($wp0Users as $wp0User) {
                        $jobSeekers[] = [
                            'id' => $i,
                            'interview_date' => null,
                            'fullname' => null,
                            'english_name' => null,
                            'nationality_id' => null,
                            'language_first_id' => null,
                            'language_second_id' => null,
                            'language_third_id' => null,
                            'language_second_speaking' => null,
                            'language_second_reading' => null,
                            'language_second_writing' => null,
                            'language_third_speaking' => null,
                            'language_third_reading' => null,
                            'language_third_writing' => null,
                            'english_fluency' => null,
                            'mail_address' => $wp0User->user_email,
                            'password' => $wp0User->user_pass,
                            'contact_number' => null,
                            'landline' => null,
                            'social_media' => null,
                            'employment_status' => null,
                            'gender' => null,
                            'birth_date' => null,
                            'highest_degree' => null,
                            'university_major' => null,
                            'present_employer' => null,
                            'current_salary' => null,
                            'expected_salary' => null,
                            'resignation_reason' => null,
                            'pending_application' => null,
                            'start_availability' => null,
                            'interview_availability' => null,
                            'preferred_shift' => null,
                            'job_posting' => null,
                            'profile' => null,
                            'interviewer' => null,
                            'complete_blind_resume' => null,
                            'deleted_at' => null,
                            'reactivation_date' => null,
                            'visa_id' => null,
                            'other_contact' => null,
                            'marital_status' => null,
                            'blind_resume' => null,
                            'preferred_employment' => null,
                            'education_level' => null,
                            'is_blacklist' => null,
                            'status' => JobSeekerStatus::InitiallyRegistered,
                            'email_verified_at' => null,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ];
                        $i++;
                    }

                    JobSeeker::insert($jobSeekers);

                    echo 'Chunk ' . $chunkNo . ' completed. Total job seekers inserted: ' . ($i - 1) . "\n";
                    $chunkNo++;
                });
        }
        echo "Finished importing from `wp0_users` table.\n";
    }

    /**
     * Returns the equivalant enum value for a given string
     *
     * @param array $cases Array of the enum's cases
     * @param string $text The string to match
     * @return int|null
     */
    private function getEnumValFromText(array $cases, string $text)
    {
        $text = trim(strtolower($text));
        foreach ($cases as $case) {
            if ($text == strtolower($case->text())) {
                return $case->value;
            }
        }

        return null;
    }

    /**
     * Returns the corresponding fluency enum cases for the language
     *
     * @param string|null $language the language to check
     * @return int|null
     */
    private function getLanguageFluencyCases(string $language)
    {
        switch ($language) {
            case 'Japanese':
                $fluencyCases = JapaneseFluency::cases();
                break;
            case 'Korean':
                $fluencyCases = KoreanFluency::cases();
                break;
            case 'Mandarin':
                $fluencyCases = MandarinFluency::cases();
                break;
            default:
                $fluencyCases = OtherFluency::cases();
                break;
        }

        return $fluencyCases;
    }
}
