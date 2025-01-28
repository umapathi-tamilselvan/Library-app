<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrower;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Search in multiple models (Books, Borrowers, Categories)
        $books = Book::where('name', 'like', '%'.$query.'%')
            ->orWhere('author', 'like', '%'.$query.'%')  // You can add more fields for searching
            ->get();

        $borrowers = Borrower::where('name', 'like', '%'.$query.'%')->get();
        $categories = Category::where('name', 'like', '%'.$query.'%')->get();

        return view('search.index', compact('books', 'borrowers', 'categories', 'query'));
    }
}
