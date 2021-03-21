<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CipherController;


// Route::get('/', function () {
//     // Eventually we'll want to return a view with our customized home page.
//     // For now, we’ll just return a simple string
//     return '<h1>Project 2 - Keryn Egan</h1>';
// });

# Update your route to look like this:
Route::get('/', [CipherController::class, 'show']);
