<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreIndustryRequest;
use App\Http\Requests\Admin\UpdateIndustryRequest;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Industry::class, 'industry');
    }

    /**
     * Store industry
     *
     * @param \App\Http\Requests\Admin\StoreIndustryRequest $request
     * @return array
     */
    public function store(StoreIndustryRequest $request)
    {
        Industry::create($request->only([
            'name',
            'parent_id',
        ]));
        $request->session()->flash('success', __('Successfully added'));
        $request->session()->flash('showCollapse', $request->input('show_collapse'));

        return [];
    }

    /**
     * Update industry
     *
     * @param \App\Models\Industry $industry
     * @param \App\Http\Requests\Admin\UpdateIndustryRequest $request
     * @return array
     */
    public function update(Industry $industry, UpdateIndustryRequest $request)
    {
        $industry->update($request->only([
            'name',
            'parent_id',
        ]));
        $request->session()->flash('success', __('Successfully updated'));
        $request->session()->flash('showCollapse', $request->input('show_collapse'));

        return [];
    }

    /**
     * Destroy industry
     *
     * @param \App\Models\Industry $industry
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function destroy(Industry $industry, Request $request)
    {
        try {
            $industry->delete();
            $industry->subCategories()->delete();

            $request->session()->flash('success', __('Successfully deleted'));
        } catch (\Exception $exception) {
            $request->session()->flash('success', __('An error has occurred'));
        } finally {
            $request->session()->flash('showCollapse', $request->input('show_collapse'));

            return [];
        }
    }
}
