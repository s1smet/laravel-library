@extends('layouts.app')

@section('title', 'Authors')

@section('content') <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                Authors </h1>

            ```
            <p class="mt-2 text-gray-600">
                Browse the authors in your library.
            </p>
        </div>

        <a href="{{ route('authors.create') }}"
            class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-700">
            + Add author
        </a>
    </div>

    <div class="mt-8 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        @forelse ($authors as $author)
            <a href="{{ route('authors.show', $author) }}"
                class="block border-b border-gray-100 px-6 py-5 last:border-b-0 transition hover:bg-gray-50">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-semibold text-gray-900">
                            {{ $author->name }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            {{ $author->books_count }}
                            {{ Str::plural('book', $author->books_count) }}
                        </p>
                    </div>

                    <span class="text-gray-400">
                        →
                    </span>
                </div>
            </a>
        @empty
            <div class="px-6 py-12 text-center">
                <p class="text-gray-500">
                    No authors yet.
                </p>

                <a href="{{ route('authors.create') }}"
                    class="mt-4 inline-block text-sm font-semibold text-gray-900 hover:underline">
                    Add your first author
                </a>
            </div>
        @endforelse
    </div>
    ```

@endsection
