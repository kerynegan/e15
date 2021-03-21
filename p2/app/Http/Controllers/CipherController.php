<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CipherController extends Controller
{
    public function show()
    {
        return view('cipher/show');
    }   
}
