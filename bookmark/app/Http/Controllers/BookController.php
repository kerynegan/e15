<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(){
        // dd(app_path());
        // dd(Str::plural('mouse'));

        // dd(public_path('css/books/show.css'));

        // dd(public_path());

        // dd(config('app.timezone'));
        
        // dd(e('<script>'));

        dd(storage_path('temp'));

        return 'Here are all the books...!';
    }
    public function show($title){
        return 'You are trying to view the book ' . $title;
    }
    public function search($category, $subcategory) {
        return 'Search in: '.$category.', '.$subcategory;
    }
    public function edit($title = null) {
    dump($title);
    return view('books/edit');
    }
}


