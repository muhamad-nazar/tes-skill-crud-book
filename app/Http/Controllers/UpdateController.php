<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    //Categories
    public function categories($id,Request $request) {
        $category = Category::find($id);

        $category->name = $request->category;

        $category->update();

        return back()->with('success', 'Category Successfully Updated!');
    }
}
