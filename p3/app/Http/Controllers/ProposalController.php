<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProposalController extends Controller
{
    //GET index of courses i've proposed ('.../proposals')
    public function showproposals() {
        return view('proposals/showproposals');
    }

    //GET detailed proposal ('.../proposals/{id}/')
    public function detailproposals() {
        return view('proposals/detailproposals');
    }   

    //GET page to confirm deletion of proposal by id ('.../proposals/{id}/delete')
    public function delete() {
        return view('proposals/delete');
    } 

    //DELETE a proposal by id ('.../proposals/{id}')
    public function destroy() {
        return redirect('proposals/showproposals');
        // ->with([
        //     'flash-alert' => '“' . $book->title . '” was removed.'
        // ])
    }  

    //GET index of courses i've taught in previous terms ('.../courses')
    public function showcourses() {
        return view('proposals/showcourses');
    }   

    //GET details of course i taught in previous term ('.../courses/{id}')
    public function detailcourses() {
        return view('proposals/detailcourses');
    }    

    //GET the create new proposal form ('.../proposals/create')
    public function create() {
        return view('proposals/create');
    }   
    
    //POST the form data to the proposals table (redirects to ('.../proposals')
    public function store() {
        return redirect('/proposals');
        // ->with(['flash-alert' => 'The book “'.$action->results->title.'” was added.']);
    }   

}
