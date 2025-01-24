<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrower;
use App\Models\Category;

class LibraryController extends Controller
{
    public function book()
    {
        $books = Book::paginate(10);

        return view('book.book', compact('books'));
    }

    public function borrower()
    {
        $borrowers = Borrower::paginate(10);

        return view('borrower.borrower', compact('borrowers'));
    }

    public function index()
    {
        $bookCount = Book::where('available_copies', '>', 0)->sum('available_copies');
        $availableBookCount = Book::where('available_copies', '>', 0)->count();
        $borrowerCount = Borrower::count();
        $categories = Category::withCount('books')->get();

        return view('home', compact('bookCount', 'borrowerCount', 'categories', 'availableBookCount'));
    }
}
