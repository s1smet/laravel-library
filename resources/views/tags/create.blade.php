@extends('layouts.app')

@section('content')
    <h1>Add Tag</h1>

    <form method="POST" action="{{ route('tags.store') }}">
        @csrf

        <div>
            <label for="name">Name</label>

            <input type="text" id="name" name="name" value="{{ old('name') }}" required>

            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Create tag</button>
    </form>

    <a href="{{ route('tags.index') }}">Back to tags</a>
@endsection
