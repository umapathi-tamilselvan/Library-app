<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrower;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $borrowers=Borrower::all();
        $bookCount = $books->count();
        $borrowerCount = $borrowers->count();
        return view(('home'), compact('books','borrowers','bookCount'));

    }
}
