<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProposalController extends Controller
{
    //GET index of courses i've proposed ('.../proposals')
    public function showproposals(Request $request) {
        $proposals = $request->user()->proposals;
        return view('proposals/showproposals', ['proposals' => $proposals]);
    }

    //GET detailed proposal ('.../proposals/{id}/')
    public function detailproposals(Request $request, $id) {
        $proposal = $request->user()->proposals->where('id', '=', $id)->first();
        return view('proposals/detailproposals', ['proposal' => $proposal]);
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
    public function showcourses(Request $request) {
            $courses = $request->user()->courses->sortBy('subject_code');
            return view('proposals/showcourses', ['courses' => $courses]);
    }   

    //GET details of course i taught in previous term ('.../courses/{id}')
    public function detailcourses(Request $request, $id) {
        $course = $request->user()->courses->where('id', '=', $id)->first();
        // dd($course->toArray());
        return view('proposals/detailcourses', ['course' => $course]);
    }    

    //GET the create new proposal form ('.../proposals/create')
    public function create (Request $request, $id = null) {
        //if course id is not null, pull the course's data and prefill the proposal's variables.
        if ($id != null) {
           $course = $request->user()->courses->find($id);
           dd($course->id);
            return view('proposals/create')->with('course', $course);
        }
        return view('proposals/create');
        
    }   
    public function makeRequest(Request $request, $id=null)
    {
        if ($id != null) {
            $target = Partner::find($id);
            return view('pages.makeRequest')->with('target', $target);
        }
        return view('pages.makeNullRequest');
    }
    
    //POST the form data to the proposals table (redirects to ('.../proposals')
    public function store() {
        return redirect('/proposals');
        // ->with(['flash-alert' => 'The book “'.$action->results->title.'” was added.']);
    }   

}
