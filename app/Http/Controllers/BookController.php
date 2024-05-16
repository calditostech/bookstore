<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'value' => 'required|numeric|min:0',
        ]);

        $book = new Book();
        $book->name = $request->input('name');
        $book->isbn = $request->input('isbn');
        $book->value = $request->input('value');
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function create()
    {
        return view('books.create');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'isbn' => 'sometimes|required|string||max:255',
            'value' => 'sometimes|required|numeric',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book a updated!');
    }

    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return redirect()->route('books.index')->with('success', 'Store a deleted!');
    }
}
