<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
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
        $category = Category::latest()->get();
        return view('pages.books.categories', [
            "title" => "Categories",
            "link" => "category",
            "category" => $category
        ]);
    }

    //Books
    public function books($id) {
        $books = Books::where('categories_id', $id)->get();

        $categories = Category::all();

        $category = Category::find($id);

        $nameCategory = $category->name;

        return view('pages.books.books', [
            "title" => "Books | " . $nameCategory,
            "link" => "category",
            "nameCategory" => $nameCategory,
            "books" => $books,
            "category" => $categories
        ]);
    }

    //Pages Update Books
    public function booksPages($id) {
        $books = Books::find($id);
        $categories = Category::all();
        return view('pages.books.books-update', [
            "title" => "Update Books | " . $books->title,
            "link" => "category",
            "books" => $books,
            "category" => $categories
        ]);
    }

    //View Books
    public function viewBooks($id, $title) {
        $books = Books::find($id);

        return view('pages.books.books-views', [
            "title" => "Views | " . $books->title,
            "link" => "category",
            "books" => $books,
        ]);
    }
}
