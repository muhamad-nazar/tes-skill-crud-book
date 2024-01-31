<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UpdateController extends Controller
{
    //Categories
    public function categories($id,Request $request) {
        $category = Category::find($id);

        $category->name = $request->category;

        $category->update();

        return back()->with('success', 'Category Successfully Updated!');
    }

    //Books
    public function books($id,Request $request) {
        $books = Books::find($id);

        if ($request->total_page <= 100) {
            $thickness = "Tipis";
        } else if ($request->total_page > 100 && $request->total_page <= 200) {
            $thickness = "Sedang";
        } else {
            $thickness = "Tebal";
        }

        $books->categories_id = $request->categories_id;
        $books->title = $request->title;
        $books->description = $request->description;
        $books->release_year = $request->release_year;
        $books->price = $request->price;
        $books->total_page = $request->total_page;
        $books->thickness = $thickness;

        if($request->has('image_url')) {
            File::delete('img/Books/'. $books->image_url);
            $image_url = $request->file('image_url');
            $filename = $image_url->getClientOriginalName();
            $image_url->move(public_path('img/Books'), $filename);
            $books->image_url = $request->file('image_url')->getClientOriginalName();
        }

        $books->update();

        return back()->with('success', 'Books Successfully Updated!');

    }
}
