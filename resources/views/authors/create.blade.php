@extends('layouts.app')

@section('content')
    <h1>Add Author</h1>

    <form method="POST" action="{{ route('authors.store') }}">
        @csrf

        <div>
            <label for="name">Name</label>

            <input type="text" id="name" name="name" value="{{ old('name') }}">

            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">
            Create author
        </button>
    </form>

    <a href="{{ route('authors.index') }}">
        Back to authors
    </a>
@endsection
