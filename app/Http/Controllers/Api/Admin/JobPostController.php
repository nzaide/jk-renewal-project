<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    /**
     * Get job seekers
     *
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        // Pull the job seekers
        return JobPost::where('job_name_en', 'like', '%' . $request->input('search') . '%')
            ->orderByDesc('id')
            ->paginate(config('constant.PAGINATION_LIMIT'))
            ->withQueryString();
    }
}
