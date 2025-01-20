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

    public function create()
    {
        $data = request()->validate([
            'name' => 'required',
            'author' => 'required',
        ]);
        $books = Book::create($data);
        $books->save();

        return redirect('/home');
    }

    public function destroy($id)
    {
        $books = Book::findOrFail($id);
        $books->delete();
        return redirect()->back();

    }
}
