<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    //Categories
    public function categories(Request $request) {
        // Validasi data
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        Category::create([
            "name" => $request->category
        ]);

        return back()->with('success', 'Data Category Successfully Added!');
    }

    public function books(Request $request) {
        $file = $request->file('image_url');

		$nama_file = time()."_".$file->getClientOriginalName();

      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'img/Books';

        $file->move($tujuan_upload,$nama_file);

        $thickness = "";

        if ($request->total_page <= 100) {
            $thickness = "Tipis";
        } else if ($request->total_page > 100 && $request->total_page <= 200) {
            $thickness = "Sedang";
        } else {
            $thickness = "Tebal";
        }


        Books::create([
            "categories_id" => $request->categories_id,
            "title" => $request->title,
            "description" => $request->description,
            "image_url" => $nama_file,
            "release_year" => $request->release_year,
            "price" => $request->price,
            "total_page" => $request->total_page,
            "thickness" => $thickness
        ]);

        return back()->with('success', 'Books Successfully Added!');
    }
}
