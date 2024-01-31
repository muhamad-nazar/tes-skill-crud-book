<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class DeleteController extends Controller
{
    //Delete Categories
    public function categories($id) {
        $category = Category::find($id);

        $category->delete();

        return back()->with('success', 'Category ' . $category->name . ' Sucessfully Deleted!');
    }

    //Delete Books
    public function books($id) {
        $books = Books::find($id);

        File::delete('img/Books/'. $books->image_url);

        $books->delete();

        return back()->with('success', 'Books ' . $books->title . ' Sucessfully Deleted!');

    }
}
