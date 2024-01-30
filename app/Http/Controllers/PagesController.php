<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Filter atau Search Data Pages
    public function index() {
        return view('pages.index', [
            "title" => "Books | Filter",
            "link" => "home"
        ]);
    }

    //Categories & Books Pages
    public function categories() {
        return view('pages.books.categories', [
            "title" => "Categories",
            "link" => "category"
        ]);
    }
}
