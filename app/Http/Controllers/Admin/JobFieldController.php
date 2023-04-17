<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJobFieldRequest;
use App\Http\Requests\Admin\UpdateJobFieldRequest;
use App\Models\JobField;
use Illuminate\Http\Request;

class JobFieldController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(JobField::class, 'job_field');
    }

    /**
     * Store job field
     *
     * @param \App\Http\Requests\Admin\StoreJobFieldRequest $request
     * @return array
     */
    public function store(StoreJobFieldRequest $request)
    {
        JobField::create($request->only([
            'name',
            'parent_id',
        ]));
        $request->session()->flash('success', __('Successfully added'));
        $request->session()->flash('showCollapse', $request->input('show_collapse'));

        return [];
    }

    /**
     * Update job field
     *
     * @param \App\Models\JobField $jobField
     * @param \App\Http\Requests\Admin\UpdateJobFieldRequest $request
     * @return array
     */
    public function update(JobField $jobField, UpdateJobFieldRequest $request)
    {
        $jobField->update($request->only([
            'name',
            'parent_id',
        ]));
        $request->session()->flash('success', __('Successfully updated'));
        $request->session()->flash('showCollapse', $request->input('show_collapse'));

        return [];
    }

    /**
     * Destroy job field
     *
     * @param \App\Models\JobField $jobField
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function destroy(JobField $jobField, Request $request)
    {
        try {
            $jobField->delete();
            $jobField->subCategories()->delete();

            $request->session()->flash('success', __('Successfully deleted'));
        } catch (\Exception $exception) {
            $request->session()->flash('success', __('An error has occurred'));
        } finally {
            $request->session()->flash('showCollapse', $request->input('show_collapse'));

            return [];
        }
    }
}
