<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Tag;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function createForAuthor(Author $author)
    {
        return view('books.create-for-author', [
            'author' => $author,
        ]);
    }

    public function storeForAuthor(Request $request, Author $author)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'published_year' => ['nullable', 'integer', 'min:1000', 'max:2100'],
        ]);

        $author->books()->create($validated);

        return redirect()->route('authors.show', $author);
    }

    public function edit(Book $book)
    {
        $tags = Tag::orderBy('name')->get();

        $book->load('tags');

        return view('books.edit', [
            'book' => $book,
            'tags' => $tags,
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'published_year' => ['nullable', 'integer', 'min:1000', 'max:2100'],
            'tags' => ['array'],
            'tags.*' => ['integer', 'exists:tags,id'],
        ]);

        $book->update([
            'title' => $validated['title'],
            'published_year' => $validated['published_year'] ?? null,
        ]);

        $book->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('authors.show', $book->author);
    }

    public function destroy(Book $book)
    {
        $author = $book->author;

        $book->delete();

        return redirect()->route('authors.show', $author);
    }
}
