<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Enum\Role;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Mail\Admin\AdminStoredMail;
use App\Mail\Admin\AdminUpdateMail;
use App\Models\Admin;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display the accounts list page
     *
     * @return View
     */
    public function index()
    {
        $this->authorize('viewAny', Admin::class);

        return view('admin.admins.index');
    }

    /**
     * Display the admin create page
     *
     * @return View
     */
    public function create()
    {
        $this->authorize('create', Admin::class);
        $groups = Group::all();

        return view('admin.admins.create', compact('groups'));
    }

    /**
     * Store admin account
     *
     * @param \App\Http\Requests\Admin\StoreAdminRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreAdminRequest $request)
    {
        $this->authorize('create', Admin::class);

        $admin = Admin::create($request->only([
            'group_id',
            'fullname',
            'mail_address',
            'password',
            'role',
        ]));

        $mailable = new AdminStoredMail($admin);

        Admin::where('role', Role::Administrator->value)->chunk(
            config('mail.max_recipients'),
            function ($admins) use ($mailable) {
                Mail::to($admins)->send($mailable);
            }
        );

        return redirect()
            ->route('admin.admins.index')
            ->with(['success' =>  __('Successfully added')]);
    }

    /**
     * Display the accounts list page
     *
     * @param int $id id of the selected admin account
     *
     * @return View
     */
    public function edit(Admin $admin)
    {
        $this->authorize('update', Admin::class);
        $groups = Group::all();

        return view('admin.admins.edit', compact(['admin', 'groups']));
    }

    /**
     * Update admin
     *
     * @param \App\Models\Admin $admin
     * @param \App\Http\Requests\Admin\UpdateAdminRequest $request
     *
     * @return RedirectResponse
     */
    public function update(Admin $admin, UpdateAdminRequest $request)
    {
        $this->authorize('update', Admin::class);
        $admin->update($request->only([
            'group_id',
            'fullname',
            'mail_address',
            'password',
            'role',
        ]));

        $admins = Admin::where('role', Role::Administrator->value)->get();
        Mail::to($admins)->send(new AdminUpdateMail($admin->id));

        return redirect()->route('admin.admins.index')
            ->with([
                'success' =>  __('Successfully updated'),
            ]);
    }

    /**
     * Destroy admins
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        $this->authorize('delete', Admin::class);
        try {
            $ids = explode(',', $request->input('ids'));
            $admins = Admin::whereIn('id', $ids);
            if ($admins->exists()) {
                $admins->delete();

                return back()->with('success', __('Successfully deleted'));
            }

            return back()->with('error', __('An error has occurred'));
        } catch (\Exception $exception) {
            return back()->with('error', __('An error has occurred'));
        }
    }
}
