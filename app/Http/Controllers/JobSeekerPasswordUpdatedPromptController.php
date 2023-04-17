<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobSeekerPasswordUpdatedPromptController extends Controller
{
    /**
     * Display user password complete page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        if (session('isPasswordUpdated')) {
            return view('job-seekers.password.complete');
        }

        abort(404);
    }
}
