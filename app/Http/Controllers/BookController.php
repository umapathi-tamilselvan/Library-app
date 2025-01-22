<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('book.create');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
        }

        $book = new Book;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->image = $imagePath;
        $book->save();

        return redirect()->route('home')->with('success', 'Book added successfully!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id); // Use singular $book for clarity
        $book->delete();

        return redirect()->back()->with('success', 'Book deleted successfully!'); // Add success message after deletion
    }
}
