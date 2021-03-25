<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\CipherController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'show']);
Route::get('/contact', [PageController::class, 'contact']); 

Route::get('/columnar', [CipherController::class, 'show']); 
Route::get('/columnar/create', [CipherController::class, 'create']);
