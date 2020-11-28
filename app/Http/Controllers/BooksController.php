<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use http\Env\Response;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function add()
    {
        $authors = Author::all();
        return view('books.add', ['authors' => $authors]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'publish_year' => 'required|integer',
            'edition' => 'required',
            'stocks' => 'required|integer',
            'author' => 'required'
        ]);
        $book = Book::create($validatedData);
        $book->authors()->attach($request->author);
        return redirect('/books');
    }
}
