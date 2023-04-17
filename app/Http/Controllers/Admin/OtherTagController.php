<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOtherTagRequest;
use App\Http\Requests\Admin\UpdateOtherTagRequest;
use App\Models\OtherTag;
use Illuminate\Http\Request;

class OtherTagController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(OtherTag::class, 'other_tag');
    }

    /**
     * Store otherTag
     *
     * @param \App\Http\Requests\Admin\StoreOtherTagRequest $request
     * @return array
     */
    public function store(StoreOtherTagRequest $request)
    {
        OtherTag::create($request->only([
            'name',
        ]));
        $request->session()->flash('success', __('Successfully added'));
        $request->session()->flash('showCollapse', $request->input('show_collapse'));

        return [];
    }

    /**
     * Update otherTag
     *
     * @param \App\Models\OtherTag $otherTag
     * @param \App\Http\Requests\Admin\UpdateOtherTagRequest $request
     * @return array
     */
    public function update(OtherTag $otherTag, UpdateOtherTagRequest $request)
    {
        $otherTag->update($request->only([
            'name',
        ]));
        $request->session()->flash('success', __('Successfully updated'));
        $request->session()->flash('showCollapse', $request->input('show_collapse'));

        return [];
    }

    /**
     * Destroy otherTag
     *
     * @param \App\Models\OtherTag $otherTag
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function destroy(OtherTag $otherTag, Request $request)
    {
        try {
            $otherTag->delete();

            $request->session()->flash('success', __('Successfully deleted'));
        } catch (\Exception $exception) {
            $request->session()->flash('success', __('An error has occurred'));
        } finally {
            $request->session()->flash('showCollapse', $request->input('show_collapse'));

            return [];
        }
    }
}
