<?php

use App\Models\Author;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a tag can be created', function () {
    $tag = Tag::create([
        'name' => 'Science Fiction',
    ]);

    expect($tag->name)->toBe('Science Fiction');

    $this->assertDatabaseHas('tags', [
        'name' => 'Science Fiction',
    ]);
});

test('a tag can have books', function () {
    $author = Author::create([
        'name' => 'George Orwell',
    ]);

    $book = $author->books()->create([
        'title' => '1984',
        'published_year' => 1949,
    ]);

    $tag = Tag::create([
        'name' => 'Classic',
    ]);

    $tag->books()->attach($book);

    expect($tag->books->contains($book))->toBeTrue();

    $this->assertDatabaseHas('book_tag', [
        'book_id' => $book->id,
        'tag_id' => $tag->id,
    ]);
});
