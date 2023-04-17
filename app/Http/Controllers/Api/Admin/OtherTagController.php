<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\OtherTag;
use Illuminate\Http\Request;

class OtherTagController extends Controller
{
    /**
     * Get other tags accounts
     *
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        // Pull all other tags
        return OtherTag::where('name', 'like', '%' . $request->input('search') . '%')
            ->orderByDesc('id')
            ->get();
    }
}
