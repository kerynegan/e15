<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show()
    {   
        $keywordarray = session('keywordarray', null);
        $newmsg = session('newmsg', null);
        $encodedarray = session('encodedarray', null);
        $encodedmsg = session('encodedmsg', null);
        $keyword = session('keyword', null);
        $message = session('message', null);
        $alphaorder = session('alphaorder', null);
        $sortlr = session('sortlr', 'left');
        $sorttb = session('sorttb', 'top');
        $display = session('display', null);

        
        return view('page/welcome', [

            'keywordarray' => $keywordarray,
            'newmsg' => $newmsg,       
            'encodedarray' => $encodedarray,
            'encodedmsg' => $encodedmsg,
            'keyword' => $keyword,
            'message' =>$message,
            'alphaorder' => $alphaorder,
            'sortlr' => $sortlr,
            'sorttb' => $sorttb,
            'display' =>$display      
        ]);
 

    }
    public function contact()
    {
        return view('page/contact');

    }

}
