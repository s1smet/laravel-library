<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy('name')->get();

        return view('authors.index', [
            'authors' => $authors,
        ]);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Author::create($validated);

        return redirect()->route('authors.index');
    }

    public function show(Author $author)
    {
        $author->load('books.tags');

        return view('authors.show', [
            'author' => $author,
        ]);
    }
}
