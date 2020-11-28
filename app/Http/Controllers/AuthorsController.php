<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }
    public function add()
    {
        return view('authors.add');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'birth_year' => 'required|integer'
        ]);
        Author::create($validatedData);
        return redirect('/authors');
    }
}
