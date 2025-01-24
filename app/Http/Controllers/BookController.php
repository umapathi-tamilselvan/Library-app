<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $categories = Category::with('books')->get();
        return view('book.create', compact('categories'));
    }

    public function create(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'total_copies' => 'required|integer|min:0',
            'available_copies' => 'required|integer|min:0|max:'.$request->total_copies,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload if present
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
        }

        // Create a new Book instance
        $book = new Book;
        $book->name = $validated['name'];
        $book->author = $validated['author'];
        $book->category_id = $validated['category_id'];
        $book->total_copies = $validated['total_copies'];
        $book->available_copies = $validated['available_copies'];
        $book->image = $imagePath;

        // Save the book to the database
        $book->save();

        // Redirect with success message
        return redirect()->route('home')->with('success', 'Book added successfully!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id); // Use singular $book for clarity
        $book->delete();

        return redirect()->back()->with('success', 'Book deleted successfully!'); // Add success message after deletion
    }
}
