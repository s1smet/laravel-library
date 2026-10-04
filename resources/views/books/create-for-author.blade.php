@extends('layouts.app')

@section('title', 'Add Book')

@section('content') <div class="mx-auto max-w-2xl">
        <div>
            <p class="text-sm font-medium text-gray-500">
                {{ $author->name }} </p>

            ```
            <h1 class="mt-1 text-3xl font-bold tracking-tight text-gray-900">
                Add book
            </h1>

            <p class="mt-2 text-gray-600">
                Add a new book by {{ $author->name }}.
            </p>
        </div>

        <form method="POST" action="{{ route('authors.books.store', $author) }}"
            class="mt-8 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">
                    Title
                </label>

                <input type="text" id="title" name="title" value="{{ old('title') }}" required autofocus
                    class="mt-2 block w-full rounded-lg border-gray-300 px-3 py-2.5 text-sm shadow-sm outline-none transition focus:border-gray-900 focus:ring-1 focus:ring-gray-900">
            </div>

            <div class="mt-5">
                <label for="published_year" class="block text-sm font-medium text-gray-700">
                    Published year
                </label>

                <input type="number" id="published_year" name="published_year" value="{{ old('published_year') }}"
                    min="1000" max="2100"
                    class="mt-2 block w-full rounded-lg border-gray-300 px-3 py-2.5 text-sm shadow-sm outline-none transition focus:border-gray-900 focus:ring-1 focus:ring-gray-900">
            </div>

            <div class="mt-6 flex items-center justify-end gap-3">
                <a href="{{ route('authors.show', $author) }}"
                    class="rounded-lg px-4 py-2.5 text-sm font-medium text-gray-600 transition hover:bg-gray-100 hover:text-gray-900">
                    Cancel
                </a>

                <button type="submit"
                    class="rounded-lg bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-700">
                    Add book
                </button>
            </div>
        </form>
    </div>
    ```

@endsection
