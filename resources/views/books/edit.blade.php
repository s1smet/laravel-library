@extends('layouts.app')

@section('title', 'Edit ' . $book->title)

@section('content') <div class="mx-auto max-w-2xl">
        <div>
            <p class="text-sm font-medium text-gray-500">
                {{ $book->author->name }} </p>

            ```
            <h1 class="mt-1 text-3xl font-bold tracking-tight text-gray-900">
                Edit book
            </h1>

            <p class="mt-2 text-gray-600">
                Update the details and tags for <span class="font-medium text-gray-900">{{ $book->title }}</span>.
            </p>
        </div>

        <form method="POST" action="{{ route('books.update', $book) }}"
            class="mt-8 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">
                    Title
                </label>

                <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required
                    autofocus
                    class="mt-2 block w-full rounded-lg border-gray-300 px-3 py-2.5 text-sm shadow-sm outline-none transition focus:border-gray-900 focus:ring-1 focus:ring-gray-900">
            </div>

            <div class="mt-5">
                <label for="published_year" class="block text-sm font-medium text-gray-700">
                    Published year
                </label>

                <input type="number" id="published_year" name="published_year"
                    value="{{ old('published_year', $book->published_year) }}" min="1000" max="2100"
                    class="mt-2 block w-full rounded-lg border-gray-300 px-3 py-2.5 text-sm shadow-sm outline-none transition focus:border-gray-900 focus:ring-1 focus:ring-gray-900">
            </div>

            <div class="mt-6">
                <div>
                    <h2 class="text-sm font-medium text-gray-700">
                        Tags
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Select all tags that apply to this book.
                    </p>
                </div>

                <div class="mt-4 grid gap-3 sm:grid-cols-2">
                    @forelse ($tags as $tag)
                        <label
                            class="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-200 px-4 py-3 transition hover:bg-gray-50">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @checked(in_array($tag->id, old('tags', $book->tags->pluck('id')->all())))
                                class="h-4 w-4 rounded border-gray-300 text-gray-900 focus:ring-gray-900">

                            <span class="text-sm font-medium text-gray-700">
                                {{ $tag->name }}
                            </span>
                        </label>
                    @empty
                        <p class="text-sm text-gray-500 sm:col-span-2">
                            No tags exist yet.
                        </p>
                    @endforelse
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end gap-3">
                <a href="{{ route('authors.show', $book->author) }}"
                    class="rounded-lg px-4 py-2.5 text-sm font-medium text-gray-600 transition hover:bg-gray-100 hover:text-gray-900">
                    Cancel
                </a>

                <button type="submit"
                    class="rounded-lg bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-700">
                    Save changes
                </button>
            </div>
        </form>
    </div>
    ```

@endsection
