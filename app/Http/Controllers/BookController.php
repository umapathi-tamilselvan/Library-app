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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        // Handle the image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Store the image and get the file path
            $imagePath = $request->file('image')->store('books', 'public');
        }

        // Create a new book
        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->image = $imagePath; // Save the image path
        $book->save();

        // Redirect with success message
        return redirect()->route('home')->with('success', 'Book added successfully!');
    }

    public function destroy($id)
    {
        $books = Book::findOrFail($id);
        $books->delete();

        return redirect()->back();

    }
}
