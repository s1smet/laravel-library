<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Laravel Library' }}</title>
</head>

<body>
    <nav>
        <a href="{{ route('authors.index') }}">Authors</a>
        |
        <a href="{{ route('tags.index') }}">Tags</a>
    </nav>

    <main>
        @yield('content')
    </main>
</body>

</html>
