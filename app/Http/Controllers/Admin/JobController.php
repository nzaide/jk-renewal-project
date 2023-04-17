<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJobRequest;
use App\Http\Requests\Admin\UpdateJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Job::class, 'job');
    }

    /**
     * Store job
     *
     * @param \App\Http\Requests\Admin\StoreJobRequest $request
     * @return array
     */
    public function store(StoreJobRequest $request)
    {
        Job::create($request->only([
            'name',
        ]));
        $request->session()->flash('success', __('Successfully added'));
        $request->session()->flash('showCollapse', $request->input('show_collapse'));

        return [];
    }

    /**
     * Update job
     *
     * @param \App\Models\Job $job
     * @param \App\Http\Requests\Admin\UpdateJobRequest $request
     * @return array
     */
    public function update(Job $job, UpdateJobRequest $request)
    {
        $job->update($request->only([
            'name',
        ]));
        $request->session()->flash('success', __('Successfully updated'));
        $request->session()->flash('showCollapse', $request->input('show_collapse'));

        return [];
    }

    /**
     * Destroy job
     *
     * @param \App\Models\Job $job
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function destroy(Job $job, Request $request)
    {
        try {
            $job->delete();

            $request->session()->flash('success', __('Successfully deleted'));
        } catch (\Exception $exception) {
            $request->session()->flash('success', __('An error has occurred'));
        } finally {
            $request->session()->flash('showCollapse', $request->input('show_collapse'));

            return [];
        }
    }
}
