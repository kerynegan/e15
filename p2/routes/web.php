<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CipherController;


Route::get('/', [CipherController::class, 'show']); 
// Route::get('/search', [BookController::class, 'search']); //search from book

Route::get('/create', [CipherController::class, 'create']);//--->re-route this to /

Route::post('/', [CipherController::class,  'store']);
