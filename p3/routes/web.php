<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\PracticeController;

//home page
Route::get('/', [PageController::class, 'show']);
//practice route(s)
Route::any('/practice/{n?}', [PracticeController::class, 'index']);

Route::get('/proposals/admin', [ProposalController::class, 'admin'])->middleware('adminaccesske');
Route::get('/proposals/{id}/admin', [ProposalController::class, 'admindetails'])->middleware('adminaccesske');

Route::group(['middleware' => 'auth'], function () {

    Route::post('proposals/create', [ProposalController::class, 'store']);
    //go to create new proposal page and create/store. Optional id field is to pull course id to use in reproposal.
    Route::get('/proposals/create', [ProposalController::class, 'create']);
    // Route::get('/proposals/create/', [ProposalController::class, 'create']);


    //show my proposed courses in index and in detailed view
    Route::get('/proposals', [ProposalController::class, 'showproposals']); 
    Route::get('/proposals/{id}', [ProposalController::class, 'detailproposals']);

    //confirm deletion and delete proposals by id
    Route::get('/proposals/{id}/delete', [ProposalController::class, 'delete']);
    Route::delete('/proposals/{id}', [ProposalController::class, 'destroy']);

    //show courses I've taught in prior terms in index and in detailed view
    Route::get('/courses', [ProposalController::class, 'showcourses']); 
    Route::post('/courses/{id}/save', [ProposalController::class, 'recreate']);
    Route::get('/courses/{id?}/repropose', [ProposalController::class, 'repropose']);
    Route::get('/courses/{id}', [ProposalController::class, 'detailcourses']);

});

