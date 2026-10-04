<?php

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('an author can be created', function () {
    $author = Author::create([
        'name' => 'George Orwell',
    ]);

    expect($author->name)->toBe('George Orwell');

    $this->assertDatabaseHas('authors', [
        'name' => 'George Orwell',
    ]);
});
