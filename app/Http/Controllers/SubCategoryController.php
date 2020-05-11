<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function selectCategoryAjax(Request $request, $id) {
        if ($request->ajax()) {
            return response()->json([
                'categories' => Category::where('mother_category_id', $id)->get()
            ]);
        }
    }
}
