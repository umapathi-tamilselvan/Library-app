<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrower;

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
        $bookCount = Book::count();
        $borrowerCount = Borrower::count();

        return view('home', compact('bookCount', 'borrowerCount'));
    }
}
