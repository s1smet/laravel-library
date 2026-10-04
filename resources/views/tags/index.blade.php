@extends('layouts.app')

@section('title', 'Tags')

@section('content') <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                Tags </h1>

            ```
            <p class="mt-2 text-gray-600">
                Browse the tags used in your library.
            </p>
        </div>

        <a href="{{ route('tags.create') }}"
            class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-700">
            + Add tag
        </a>
    </div>

    <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($tags as $tag)
            <a href="{{ route('tags.show', $tag) }}"
                class="group rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-semibold text-gray-900">
                            {{ $tag->name }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            View books with this tag
                        </p>
                    </div>

                    <span class="text-gray-400 transition group-hover:translate-x-1">
                        →
                    </span>
                </div>
            </a>
        @empty
            <div
                class="rounded-xl border border-dashed border-gray-300 bg-white px-6 py-12 text-center sm:col-span-2 lg:col-span-3">
                <p class="text-gray-500">
                    No tags yet.
                </p>

                <a href="{{ route('tags.create') }}"
                    class="mt-4 inline-block text-sm font-semibold text-gray-900 hover:underline">
                    Create your first tag
                </a>
            </div>
        @endforelse
    </div>
    ```

@endsection
