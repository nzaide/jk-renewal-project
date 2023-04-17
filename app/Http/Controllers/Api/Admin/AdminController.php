<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Enum\Role;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Get admin accounts
     *
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        // Pull all accounts that are admins
        return Admin::where('fullname', 'like', '%' . $request->input('search') . '%')
            ->orWhere('mail_address', 'like', '%' . $request->input('search') . '%')
            ->orderByDesc('id')
            ->paginate(config('constant.PAGINATION_LIMIT'))
            ->withQueryString();
    }
}
