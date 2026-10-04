@extends('layouts.app')

@section('content')
    <h1>Tags</h1>

    <a href="{{ route('tags.create') }}">
        Add tag
    </a>

    <ul>
        @foreach ($tags as $tag)
            <li>
                <a href="{{ route('tags.show', $tag) }}">
                    {{ $tag->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
