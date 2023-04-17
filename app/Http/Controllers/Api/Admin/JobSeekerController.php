<?php

namespace App\Http\Controllers\Api\Admin;

use App\Enums\JobSeekerStatus;
use App\Http\Controllers\Controller;
use App\Models\JobSeeker;
use Illuminate\Http\Request;

class JobSeekerController extends Controller
{
    /**
     * Get job seekers
     *
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        // Pull the job seekers
        return JobSeeker::with(['nationality', 'languageFirst'])
            ->where('fullname', 'like', '%' . $request->input('search') . '%')
            ->where('status', JobSeekerStatus::FullyRegistered->value)
            ->orderByDesc('id')
            ->paginate(config('constant.PAGINATION_LIMIT'))
            ->withQueryString();
    }
}
