<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Proposal;
use App\Models\Course;
use App\Models\User;
// use App\Actions\Book\StoreNewBook;

class ProposalController extends Controller
{
//ADMIN ONLY

    //GET index of all proposals (admin roles only)
    public function admin(Request $request) {
        $proposals = Proposal::with('user')->get();
        foreach ($proposals as $proposal) {
            $first_name = $proposal->user->first_name;
            $last_name = $proposal->user->last_name;
            $email = $proposal->user->email;
        }
        return view('proposals/admin', ['proposals' => $proposals, 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email]);
    }
    //GET details of any proposed course (admin roles only)
    public function admindetails(Request $request, $id) {
        $proposal = Proposal::with('user')->find($id);
        $first_name = $proposal->user->first_name;
        $last_name = $proposal->user->last_name;
        $email = $proposal->user->email;
        return view('proposals/admindetails', ['proposal' => $proposal, 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email]);
    }  

//USER OWN PROPOSALS

    //GET index of proposals (by user for own proposals)
    public function showproposals(Request $request) {
        $proposals = $request->user()->proposals;
        return view('proposals/showproposals', ['proposals' => $proposals]);
    }

    //GET details of a single proposal(by user for own proposals)
    public function detailproposals(Request $request, $id) {
        $proposal = $request->user()->proposals->where('id', '=', $id)->first();
        return view('proposals/detailproposals', ['proposal' => $proposal]);
    }   

    //GET confirm deletion of a proposal by id (by user for own proposals)
    public function delete(Request $request, $id) {
            $proposal = Proposal::with('user')->where('id', '=', $id)->first();  
            if (!$proposal) {
                return redirect('/proposals')->with([
                    'flash-alert' => 'Proposal not found.'
                ]);
            }
        return view('proposals/delete', ['proposal' => $proposal]);
    } 

    //DELETE a proposal by id (by user for own proposals)
    public function destroy(Request $request, $id) {
        $proposal = $request->user()->proposals->where('id', '=', $id)->first();
        $proposal->delete();
        return redirect('/proposals')->with([
            'flash-alert' => '“' . $proposal->proposed_title . '” was deleted.'
        ]);
    }

//USER OWN COURSES

    //GET index of previusly taught courses
    public function showcourses(Request $request) {
            $courses = $request->user()->courses->sortBy('subject_code');
            return view('proposals/showcourses', ['courses' => $courses]);
    }   

    //GET details of single previously taught course
    public function detailcourses(Request $request, $id) {
        $course = $request->user()->courses->where('id', '=', $id)->first();
        // dd($course->toArray());
        return view('proposals/detailcourses', ['course' => $course]);
    }    
 
//NEW PROPOSAL FORM

    //GET for new proposal form
    public function create (Request $request) {
        return view('proposals/create');        
    }   
    
    //POST for new proposals
    public function store(Request $request) {

        $user = $request->user();
        $request->validate([
            'proposed_term'=> 'required',
            'proposed_format' => 'required',
            'proposed_title' => 'required',   
            'proposed_course_description' => 'required',
        ]);

        $proposal = new Proposal();

        $proposal->user_id = $user->id;  
        $proposal->user_id = $user->id;
        $proposal->proposed_term = $request->proposed_term;
        $proposal->proposed_format = $request->proposed_format;
        $proposal->proposed_title =  $request->proposed_title;
        $proposal->proposed_note =  $request->proposed_note;
        $proposal->proposed_section_note = $request->proposed_section_note;
        $proposal->proposed_prerequisite = $request->proposed_prerequisite;          
        $proposal->proposed_description =  $request->proposed_course_description;
        $proposal->proposed_comment = $request->proposed_comment; 
   
        $proposal->save(); 
        return redirect('/proposals')->with([
            'flash-alert' => 'Your proposal was created.'
        ]);
    }   

//REPROPOSING COURSES PROPOSAL FORM

    //GET for the reproposal form
    public function repropose (Request $request, $id) {
        $course = $request->user()->courses->find($id);
        return view('proposals/repropose', ['course' => $course]);
        
    }  
    //POST for reproposal form
    public function recreate(Request $request, $id) {

        $user = $request->user();
        $request->validate([
            'proposed_term'=> 'required',
            'proposed_format' => 'required',
            'proposed_title' => 'required',   
            'proposed_course_description' => 'required',
        ]);

        $course = $request->user()->courses->find($id);
     
        $proposal = new Proposal();

        $proposal->previous_term_code = $course->term_code ?? null;
        $proposal->previous_crn = $course->crn ?? null;
        $proposal->subject_code = $course->subject_code ?? null; 
        $proposal->college_code = $course->college_code ?? null;
        $proposal->number = $course->number ?? null;
        $proposal->course_id = $course->id ?? null;
        $proposal->previous_schedule_type = $course->schedule_type ?? null;
        $proposal->previous_format = $course->format ?? null;
        $proposal->department_code = $course->department_code ?? null;
        $proposal->previous_title =  $course->title ?? null;
        $proposal->previous_note =  $course->note ?? null;
        $proposal->previous_section_note = $course->section_note ?? null;
        $proposal->previous_prerequisite = $course->prerequisite ?? null;          
        $proposal->previous_description =  $course->description ?? null;
        $proposal->user_id = $user->id;
        $proposal->proposed_term = $request->proposed_term;
        $proposal->proposed_format = $request->proposed_format;
        $proposal->proposed_title =  $request->proposed_title;
        $proposal->proposed_note =  $request->proposed_note;
        $proposal->proposed_section_note = $request->proposed_section_note;
        $proposal->proposed_prerequisite = $request->proposed_prerequisite;          
        $proposal->proposed_description =  $request->proposed_course_description;
        $proposal->proposed_comment = $request->proposed_comment;  
       
        $proposal->save(); 

        return redirect('/proposals')->with([
            'flash-alert' => 'Your reproposal was created.'
        ]);
    }     
    //GET index of proposals (by user for own proposals)
    public function denied(Request $request) {
        return view('access-denied');
    }
}
