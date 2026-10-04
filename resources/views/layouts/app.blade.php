<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    ```
    <title>@yield('title', 'Library')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    ```

</head>

<body class="min-h-screen bg-gray-100 text-gray-900">

    ```
    <header class="border-b border-gray-200 bg-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a href="{{ route('authors.index') }}" class="text-xl font-bold text-gray-900">
                📚 Library
            </a>

            <nav class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('authors.index') }}" class="text-gray-600 transition hover:text-gray-900">
                    Authors
                </a>

                <a href="{{ route('tags.index') }}" class="text-gray-600 transition hover:text-gray-900">
                    Tags
                </a>
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-6 py-10">
        @if (session('success'))
            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                <p class="font-semibold">Please fix the following:</p>

                <ul class="mt-2 list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="border-t border-gray-200 bg-white">
        <div class="mx-auto max-w-6xl px-6 py-6 text-center text-sm text-gray-500">
            Laravel Library
        </div>
    </footer>
    ```

</body>

</html>
