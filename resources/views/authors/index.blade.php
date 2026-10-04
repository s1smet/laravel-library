@extends('layouts.app')

@section('content')
    <h1>Authors</h1>

    <a href="{{ route('authors.create') }}">
        Add author
    </a>

    <ul>
        @foreach ($authors as $author)
            <li>
                <a href="{{ route('authors.show', $author) }}">
                    {{ $author->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
