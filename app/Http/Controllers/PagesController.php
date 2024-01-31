<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Filter atau Search Data Pages
    public function index() {
        $books = Books::latest()->get();
        return view('pages.index', [
            "title" => "Books | Filter",
            "link" => "home",
            "books" => $books
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

    //Filter
    public function filter(Request $request)
    {
        $query = Books::query();

        // Filter by title
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

       // Filter by release year range
       if ($request->filled('minYear') && $request->filled('maxYear')) {
            $query->whereBetween('release_year', [$request->input('minYear'), $request->input('maxYear')]);
        } elseif ($request->filled('minYear')) {
            $query->where('release_year', '>=', $request->input('minYear'));
        } elseif ($request->filled('maxYear')) {
            $query->where('release_year', '<=', $request->input('maxYear'));
        }

        // Filter by total page
        if ($request->filled('minPage') && $request->filled('maxPage')) {
            $query->whereBetween('total_page', [$request->input('minPage'), $request->input('maxPage')]);
        } elseif ($request->filled('minPage')) {
            $query->where('total_page', '>=', $request->input('minPage'));
        } elseif ($request->filled('maxPage')) {
            $query->where('total_page', '<=', $request->input('maxPage'));
        }

        // Sorting
        $sortColumn = 'title'; // default sorting by title
        $sortDirection = 'asc'; // default sorting in ascending order

        if ($request->filled('sortBy')) {
            $sortColumn = $request->input('sortBy');
        }

        if ($request->filled('sortDirection') && in_array($request->input('sortDirection'), ['asc', 'desc'])) {
            $sortDirection = $request->input('sortDirection');
        }

        $query->orderBy($sortColumn, $sortDirection);

        // Retrieve filtered books
        $books = $query->get();

        // Pass filter parameters to the view
        $filterParams = $request->only(['title', 'minYear', 'maxYear', 'minPage', 'maxPage', 'sortBy', 'sortDirection']);

        $title = "Filter";
        $link = "home";
        return view('pages.books.filter', compact('books', 'filterParams', 'title', 'link'));
    }
}
