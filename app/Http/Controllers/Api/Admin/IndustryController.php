<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Get industries
     *
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        // Pull all main industries and their sub categories
        $search = $request->input('search');
        $subCategoriesQuery = function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
            $query->orderByDesc('id');
        };

        return Industry::with(['subCategories' => $subCategoriesQuery])
            ->whereNull('parent_id')
            ->where(function ($query) use ($search, $subCategoriesQuery) {
                $query->whereHas('subCategories', $subCategoriesQuery)
                    ->orWhere('name', 'like', '%' . $search . '%');
            })
            ->orderByDesc('id')
            ->get();
    }
}
