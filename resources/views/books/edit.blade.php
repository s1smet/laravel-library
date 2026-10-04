@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>

    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required>
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="published_year">Published year</label>
            <input type="number" id="published_year" name="published_year"
                value="{{ old('published_year', $book->published_year) }}">
            @error('published_year')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <p>Tags</p>

            @foreach ($tags as $tag)
                <label>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @checked($book->tags->contains($tag))>
                    {{ $tag->name }}
                </label>
                <br>
            @endforeach

            @error('tags')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Save changes</button>
    </form>

    <a href="{{ route('authors.show', $book->author) }}">Cancel</a>
@endsection
