@extends('layouts.app')

@section('content')
    <h1>{{ $tag->name }}</h1>

    <h2>Books</h2>

    @if ($tag->books->isEmpty())
        <p>No books have this tag.</p>
    @else
        <ul>
            @foreach ($tag->books as $book)
                <li>
                    <a href="{{ route('authors.show', $book->author) }}">
                        {{ $book->title }}
                    </a>

                    — {{ $book->author->name }}

                    @if ($book->published_year)
                        ({{ $book->published_year }})
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('tags.index') }}">Back to tags</a>
@endsection
