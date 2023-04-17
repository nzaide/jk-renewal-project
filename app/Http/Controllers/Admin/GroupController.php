<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGroupRequest;
use App\Http\Requests\Admin\UpdateGroupRequest;
use App\Models\Group;

class GroupController extends Controller
{
    /**
     * A constructor function.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Group::class, 'group');
    }

    /**
     * Group list page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $groups = Group::orderByDesc('id')->get();

        return view('admin.groups.index', compact('groups'));
    }

    /**
     * Store group
     *
     * @param \App\Http\Requests\Admin\StoreGroupRequest $request
     * @return RedirectResponse
     */
    public function store(StoreGroupRequest $request)
    {
        Group::create($request->only([
            'name',
            'sender_name',
            'mail_address',
        ]));

        return back()->with('success', __('Successfully added'));
    }

    /**
     * Update group with ajax
     *
     * @param \App\Models\Group $group
     * @param \App\Http\Requests\Admin\UpdateGroupRequest $request
     * @return array
     */
    public function update(Group $group, UpdateGroupRequest $request)
    {
        $group->update($request->only([
            'name',
            'sender_name',
            'mail_address',
        ]));
        $request->session()->flash('success', __('Successfully updated'));

        return [];
    }

    /**
     * Destroy group
     *
     * @param \App\Models\Group $group
     * @return RedirectResponse
     */
    public function destroy(Group $group)
    {
        try {
            $group->delete();

            return back()->with('success', __('Successfully deleted'));
        } catch (\Exception $exception) {
            return back()->with('error', __('An error has occurred'));
        }
    }
}
