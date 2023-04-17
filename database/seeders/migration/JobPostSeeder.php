<?php

namespace Database\Seeders\Migration;

use App\Enums\JobPostDisplayStatus;
use App\Enums\JobPostStatus;
use App\Models\JobPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPostSeeder extends Seeder
{
    /**
     * The encoding of input data.
     *
     * @var string
     */
    private $inputEncoding = 'UTF-8';

    /**
     * The desired encoding to be used.
     *
     * @var string
     */
    private $outputEncoding = 'CP1252';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chunkSize = 1000;
        $now = now();
        $i = 1;

        $isJobDatasNotEmpty = DB::connection('mysql2')
            ->table('job_datas')
            ->select()
            ->exists();
        if ($isJobDatasNotEmpty) {
            JobPost::truncate();

            DB::connection('mysql2')
                ->table('job_datas')
                ->select()
                ->orderBy('jobnum')
                ->chunk($chunkSize, function ($jobDatas) use (&$i, $now) {
                    $jobPosts = [];
                    foreach ($jobDatas as $jobData) {
                        $displayStatus = JobPostDisplayStatus::Displayed->value;
                        if ($jobData->disabflg != '0') {
                            $displayStatus = JobPostDisplayStatus::Hidden->value;
                        }
                        $jobPosts[] = [
                            'id' => $i,
                            'job_number' => $jobData->jobnum ?: null,
                            'status' => JobPostStatus::Open,
                            'job_name_en' => $this->convertEncoding($jobData->jobposit),
                            'industry_en' => $this->convertEncoding($jobData->indtype),
                            'location_en' => $this->convertEncoding($jobData->wklocat),
                            'salary' => $this->convertEncoding($jobData->salary),
                            'benefits_en' => $this->convertEncoding($jobData->respons),
                            'details_en' => $this->convertEncoding($jobData->jobreq),
                            'post_start_date' => $jobData->startday,
                            'post_end_date' => $jobData->finday ?: null,
                            'display_status' => $displayStatus,
                            'target' => $jobData->forWhom,
                            'group_id' => (int)$jobData->notification + 1,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ];

                        $i++;
                    }

                    JobPost::insert($jobPosts);
                });
        }
    }

    /**
     * Converts an imported string's encoding
     *
     * @param string $text The string to convert
     * @return string
     */
    private function convertEncoding(string $text)
    {
        return mb_convert_encoding($text, $this->outputEncoding, $this->inputEncoding);
    }
}
