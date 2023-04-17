<?php

namespace App\Http\Controllers\Admin;

use App\Enums\JobSeekerGraduateEducationLevel;
use App\Enums\JobSeekerHighestDegree;
use App\Enums\JobSeekerHighSchoolEducationLevel;
use App\Enums\JobSeekerUndergraduateEducationLevel;
use Illuminate\Http\Request;

class JobSeekerEducationLevelController extends Controller
{
    /**
     * List job seeker education levels
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $highestDegree = $request->integer('highest_degree');
        $highestDegree = JobSeekerHighestDegree::tryFrom($highestDegree);

        $educationLevels = collect(
            match ($highestDegree) {
                JobSeekerHighestDegree::Graduate => JobSeekerGraduateEducationLevel::cases(),
                JobSeekerHighestDegree::Undergraduate => JobSeekerUndergraduateEducationLevel::cases(),
                JobSeekerHighestDegree::HighSchoolGraduate => JobSeekerHighSchoolEducationLevel::cases(),
                default => [],
            }
        );

        $educationLevels = $educationLevels->map(
            fn ($enum) => [
                'value' => $enum->value,
                'text' => __($enum->text()),
            ]
        );

        return response()->json($educationLevels);
    }
}
