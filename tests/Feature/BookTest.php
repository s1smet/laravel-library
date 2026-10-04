<?php

use App\Models\Author;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a book belongs to an author', function () {
    $author = Author::create([
        'name' => 'George Orwell',
    ]);

    $book = $author->books()->create([
        'title' => '1984',
        'published_year' => 1949,
    ]);

    expect($book->author->is($author))->toBeTrue();

    $this->assertDatabaseHas('books', [
        'title' => '1984',
        'author_id' => $author->id,
    ]);
});

test('a book can be created through the web form', function () {
    $author = Author::create([
        'name' => 'George Orwell',
    ]);

    $response = $this->post(
        route('authors.books.store', $author),
        [
            'title' => 'Animal Farm',
            'published_year' => 1945,
        ]
    );

    $response->assertRedirect(route('authors.show', $author));

    $this->assertDatabaseHas('books', [
        'title' => 'Animal Farm',
        'published_year' => 1945,
        'author_id' => $author->id,
    ]);
});

test('a book cannot be created without a title', function () {
    $author = Author::create([
        'name' => 'George Orwell',
    ]);

    $response = $this->post(
        route('authors.books.store', $author),
        [
            'title' => '',
            'published_year' => 1949,
        ]
    );

    $response->assertSessionHasErrors('title');

    $this->assertDatabaseMissing('books', [
        'author_id' => $author->id,
        'published_year' => 1949,
    ]);
});

test('a book can be updated', function () {
    $author = Author::create([
        'name' => 'George Orwell',
    ]);

    $book = $author->books()->create([
        'title' => '1984',
        'published_year' => 1949,
    ]);

    $response = $this->put(
        route('books.update', $book),
        [
            'title' => 'Nineteen Eighty-Four',
            'published_year' => 1949,
        ]
    );

    $response->assertRedirect(route('authors.show', $author));

    $this->assertDatabaseHas('books', [
        'id' => $book->id,
        'title' => 'Nineteen Eighty-Four',
        'published_year' => 1949,
    ]);
});

test('a book can be deleted', function () {
    $author = Author::create([
        'name' => 'George Orwell',
    ]);

    $book = $author->books()->create([
        'title' => '1984',
        'published_year' => 1949,
    ]);

    $response = $this->delete(
        route('books.destroy', $book)
    );

    $response->assertRedirect(route('authors.show', $author));

    $this->assertDatabaseMissing('books', [
        'id' => $book->id,
    ]);
});

test('tags can be assigned to a book', function () {
    $author = Author::create([
        'name' => 'George Orwell',
    ]);

    $book = $author->books()->create([
        'title' => '1984',
        'published_year' => 1949,
    ]);

    $fiction = Tag::create([
        'name' => 'Fiction',
    ]);

    $classic = Tag::create([
        'name' => 'Classic',
    ]);

    $book->tags()->sync([
        $fiction->id,
        $classic->id,
    ]);

    $this->assertDatabaseHas('book_tag', [
        'book_id' => $book->id,
        'tag_id' => $fiction->id,
    ]);

    $this->assertDatabaseHas('book_tag', [
        'book_id' => $book->id,
        'tag_id' => $classic->id,
    ]);
});

test('sync replaces a book tags', function () {
    $author = Author::create([
        'name' => 'George Orwell',
    ]);

    $book = $author->books()->create([
        'title' => '1984',
        'published_year' => 1949,
    ]);

    $fiction = Tag::create([
        'name' => 'Fiction',
    ]);

    $classic = Tag::create([
        'name' => 'Classic',
    ]);

    $book->tags()->sync([
        $fiction->id,
        $classic->id,
    ]);

    $book->tags()->sync([
        $fiction->id,
    ]);

    $this->assertDatabaseHas('book_tag', [
        'book_id' => $book->id,
        'tag_id' => $fiction->id,
    ]);

    $this->assertDatabaseMissing('book_tag', [
        'book_id' => $book->id,
        'tag_id' => $classic->id,
    ]);
});

test('updating a book synchronizes its tags', function () {
    $author = Author::create([
        'name' => 'George Orwell',
    ]);

    $book = $author->books()->create([
        'title' => '1984',
        'published_year' => 1949,
    ]);

    $fiction = Tag::create(['name' => 'Fiction']);
    $classic = Tag::create(['name' => 'Classic']);

    $book->tags()->attach([$fiction->id, $classic->id]);

    $response = $this->put(
        route('books.update', $book),
        [
            'title' => '1984',
            'published_year' => 1949,
            'tags' => [$fiction->id],
        ]
    );

    $response->assertRedirect(route('authors.show', $author));

    $this->assertDatabaseHas('book_tag', [
        'book_id' => $book->id,
        'tag_id' => $fiction->id,
    ]);

    $this->assertDatabaseMissing('book_tag', [
        'book_id' => $book->id,
        'tag_id' => $classic->id,
    ]);
});
