<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index']);
Route::get('/support', [PageController::class, 'support']);


Route::get('/books', [BookController::class, 'index']);
Route::get('/search', [BookController::class, 'search']);
// Make sure the create route comes before `/books/{slug?}` so it takes precedence
Route::get('/books/create', [BookController::class, 'create']);

// Note the use of the post method in this route
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{title}', [BookController::class, 'show']);
Route::get('/search/{category}/{subcategory}', [BookController::class, 'search']);
Route::get('/list', [BookController::class, 'list']);