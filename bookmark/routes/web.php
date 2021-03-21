<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;


Route::get('/', [PageController::class, 'index']);

Route::get('/books', [BookController::class, 'index']);

Route::get('/books/{title}', [BookController::class, 'show']);

Route::get('/search/{category}/{subcategory}', [BookController::class, 'search']);

Route::get('/books/edit', [BookController::class, 'edit']);