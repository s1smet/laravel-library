<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('authors.index');
});

Route::get('/authors', [AuthorController::class, 'index'])
    ->name('authors.index');

Route::get('/authors/create', [AuthorController::class, 'create'])
    ->name('authors.create');

Route::post('/authors', [AuthorController::class, 'store'])
    ->name('authors.store');

Route::get('/authors/{author}', [AuthorController::class, 'show'])
    ->name('authors.show');

Route::get('/authors/{author}/books/create', [BookController::class, 'createForAuthor'])
    ->name('authors.books.create');

Route::post('/authors/{author}/books', [BookController::class, 'storeForAuthor'])
    ->name('authors.books.store');

Route::get('/books/{book}/edit', [BookController::class, 'edit'])
    ->name('books.edit');

Route::put('/books/{book}', [BookController::class, 'update'])
    ->name('books.update');

Route::delete('/books/{book}', [BookController::class, 'destroy'])
    ->name('books.destroy');

Route::get('/tags', [TagController::class, 'index'])
    ->name('tags.index');

Route::get('/tags/create', [TagController::class, 'create'])
    ->name('tags.create');

Route::post('/tags', [TagController::class, 'store'])
    ->name('tags.store');

Route::get('/tags/{tag}', [TagController::class, 'show'])
    ->name('tags.show');
