<?php

namespace App\Http\Controllers;

use App\Enums\JobPostDisplayStatus;
use App\Enums\JobPostStatus;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * MyPage data
     *
     * @return void
     */
    public function __invoke()
    {
        $user = Auth::guard('web')->user();

        if ($user != null) {
            $otherLanguages = [];
            if ($user->languageSecond != null) {
                $otherLanguages[] = $user->languageSecond->language;
            }

            if ($user->languageThird != null) {
                $otherLanguages[] = $user->languageThird->language;
            }

            $applications = Application::with('jobPost')
                ->whereHas('jobPost', function ($query) {
                    $query->where([
                        ['status', JobPostStatus::Open->value],
                        ['display_status', JobPostDisplayStatus::Displayed->value]
                    ]);
                })
                ->where('job_seeker_id', $user->id)
                ->latest()
                ->paginate(10);

            return view('home', compact(
                'user',
                'otherLanguages',
                'applications'
            ));
        }
    }
}
