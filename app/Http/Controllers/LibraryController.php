<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrower;
use App\Models\Category;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $bookCount = Book::where('available_copies', '>', 0)->sum('available_copies');
        $availableBookCount = Book::where('available_copies', '>', 0)->count();
        $borrowerCount = Borrower::count();
        $categories = Category::withCount('books')->get();

        return view('home', compact('bookCount', 'borrowerCount', 'categories', 'availableBookCount'));
    }

    public function book(Request $request)
    {
        $search = $request->input('search');

        // Fetch books with optional search
        $books = Book::with('category')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            })
            ->paginate(6);

        return view('book.book', compact('books', 'search'));
    }

    public function borrower(Request $request)
    {
        $search = $request->input('search');

        // Fetch borrowers with optional search
        $borrowers = Borrower::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
            ->paginate(10);

        return view('borrower.borrower', compact('borrowers', 'search'));
    }
}
