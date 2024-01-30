<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    //Delete Categories
    public function categories($id) {
        $category = Category::find($id);

        $category->delete();

        return back()->with('success', 'Category ' . $category->name . ' Sucessfully Deleted!');
    }
}
