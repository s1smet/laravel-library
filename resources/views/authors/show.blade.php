@foreach ($author->books as $book)
    <li>
        {{ $book->title }}

        @if ($book->published_year)
            ({{ $book->published_year }})
        @endif

        <a href="{{ route('books.edit', $book) }}">
            Edit
        </a>

        <form method="POST" action="{{ route('books.destroy', $book) }}" style="display: inline">
            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('Are you sure you want to delete this book?')">
                Delete
            </button>
        </form>

        @if ($book->tags->isNotEmpty())
            <span>
                Tags:
                @foreach ($book->tags as $tag)
                    {{ $tag->name }}
                @endforeach
            </span>
        @endif
    </li>
@endforeach
