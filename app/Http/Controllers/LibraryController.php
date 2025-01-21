<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrower;

class LibraryController extends Controller
{
    public function book()
    {
        $books = Book::all();
        return view('book.book',compact('books'));
    }

    public function borrower()
    {
        $borrowers = Borrower::all();
        return view('borrower.borrower',compact('borrowers'));
    }

    public function index()
    {
        $books = Book::all();
        $borrowers = Borrower::all();
        $bookCount = $books->count();
        $borrowerCount = $borrowers->count();

        return view(('home'), compact('books', 'borrowers', 'bookCount','borrowerCount'));

    }
}
