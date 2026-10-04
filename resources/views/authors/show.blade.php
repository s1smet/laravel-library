@extends('layouts.app')

@section('title', $author->name)

@section('content') <div class="flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500">
                Author </p>

            ```
            <h1 class="mt-1 text-3xl font-bold tracking-tight text-gray-900">
                {{ $author->name }}
            </h1>
        </div>

        <a href="{{ route('authors.books.create', $author) }}"
            class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-700">
            + Add book
        </a>
    </div>

    <div class="mt-8">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900">
                Books
            </h2>

            <span class="text-sm text-gray-500">
                {{ $author->books->count() }}
                {{ Str::plural('book', $author->books->count()) }}
            </span>
        </div>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            @forelse ($author->books as $book)
                <div class="border-b border-gray-100 px-6 py-5 last:border-b-0">
                    <div class="flex items-start justify-between gap-6">
                        <div class="min-w-0">
                            <h3 class="font-semibold text-gray-900">
                                {{ $book->title }}
                            </h3>

                            @if ($book->published_year)
                                <p class="mt-1 text-sm text-gray-500">
                                    Published {{ $book->published_year }}
                                </p>
                            @endif

                            @if ($book->tags->isNotEmpty())
                                <div class="mt-3 flex flex-wrap gap-2">
                                    @foreach ($book->tags as $tag)
                                        <a href="{{ route('tags.show', $tag) }}"
                                            class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700 transition hover:bg-gray-200">
                                            {{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="flex shrink-0 items-center gap-3">
                            <a href="{{ route('books.edit', $book) }}"
                                class="text-sm font-medium text-gray-600 hover:text-gray-900">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('books.destroy', $book) }}"
                                onsubmit="return confirm('Are you sure you want to delete this book?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="px-6 py-12 text-center">
                    <p class="text-gray-500">
                        This author has no books yet.
                    </p>

                    <a href="{{ route('authors.books.create', $author) }}"
                        class="mt-4 inline-block text-sm font-semibold text-gray-900 hover:underline">
                        Add the first book
                    </a>
                </div>
            @endforelse
        </div>
    </div>

    <div class="mt-8">
        <a href="{{ route('authors.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
            ← Back to authors
        </a>
    </div>
    ```

@endsection
