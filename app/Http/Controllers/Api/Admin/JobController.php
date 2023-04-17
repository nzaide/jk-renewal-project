<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Get jobs accounts
     *
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        // Pull all jobs
        return Job::where('name', 'like', '%' . $request->input('search') . '%')
            ->orderByDesc('id')
            ->get();
    }
}
