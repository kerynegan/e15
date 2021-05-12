<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //return home page
    public function show() {
        return view('pages/welcome');
    }
}
