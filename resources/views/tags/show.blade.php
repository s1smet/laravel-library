@extends('layouts.app')

@section('title', $tag->name)

@section('content') <div>
        <p class="text-sm font-medium text-gray-500">
            Tag </p>

        ```
        <h1 class="mt-1 text-3xl font-bold tracking-tight text-gray-900">
            {{ $tag->name }}
        </h1>

        <p class="mt-2 text-gray-600">
            Books with this tag.
        </p>
    </div>

    <div class="mt-8">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900">
                Books
            </h2>

            <span class="text-sm text-gray-500">
                {{ $tag->books->count() }}
                {{ Str::plural('book', $tag->books->count()) }}
            </span>
        </div>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            @forelse ($tag->books as $book)
                <a href="{{ route('authors.show', $book->author) }}"
                    class="block border-b border-gray-100 px-6 py-5 last:border-b-0 transition hover:bg-gray-50">
                    <div class="flex items-center justify-between gap-6">
                        <div>
                            <h3 class="font-semibold text-gray-900">
                                {{ $book->title }}
                            </h3>

                            <p class="mt-1 text-sm text-gray-500">
                                {{ $book->author->name }}

                                @if ($book->published_year)
                                    · {{ $book->published_year }}
                                @endif
                            </p>
                        </div>

                        <span class="shrink-0 text-gray-400">
                            →
                        </span>
                    </div>
                </a>
            @empty
                <div class="px-6 py-12 text-center">
                    <p class="text-gray-500">
                        No books have this tag yet.
                    </p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="mt-8">
        <a href="{{ route('tags.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
            ← Back to tags
        </a>
    </div>
    ```

@endsection
