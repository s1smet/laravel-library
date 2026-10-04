@extends('layouts.app')

@section('content')
    <h1>Add Book for {{ $author->name }}</h1>

    <form method="POST" action="{{ route('authors.books.store', $author) }}">
        @csrf

        <div>
            <label for="title">Title</label>

            <input type="text" id="title" name="title" value="{{ old('title') }}" required>

            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="published_year">Published year</label>

            <input type="number" id="published_year" name="published_year" value="{{ old('published_year') }}">

            @error('published_year')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Create book</button>
    </form>

    <a href="{{ route('authors.show', $author) }}">
        Cancel
    </a>
@endsection
