<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdminRoleRequest;
use App\Models\Admin;

class AdminRoleController extends Controller
{
    /**
     * Update Admin role
     *
     * @param \App\Http\Requests\Admin\UpdateAdminRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAdminRoleRequest $request)
    {
        $this->authorize('update', Admin::class);
        $ids = explode(',', $request->input('ids'));
        $admins = Admin::whereIn('id', $ids);
        if ($admins->exists()) {
            $admins->update(['role' => $request->input('role')]);

            return redirect()->route('admin.admins.index')
                ->with('success', __('Successfully updated'));
        }

        return redirect()->route('admin.admins.index')
            ->with('error', __('An error has occurred'));
    }
}
