<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Industry,
    JobField,
};
use Illuminate\Support\Facades\Gate;

class OptionController extends Controller
{
    /**
     * Options page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        Gate::allowIf(fn ($user) => $user->isAdministrator());

        $industries = Industry::whereNull('parent_id')->orderByDesc('id')->get();
        $jobFields = JobField::whereNull('parent_id')->orderByDesc('id')->get();

        return view('admin.options.index', compact([
            'industries',
            'jobFields',
        ]));
    }
}
