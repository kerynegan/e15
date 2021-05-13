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


    public function admin(Request $request) {
        $proposals = Proposal::with('user')->get();
        return view('proposals/admin', ['proposals' => $proposals]);
    }

    public function admindetails(Request $request, $id) {
        $proposal = $request->proposals->where('id', '=', $id)->first();
        return view('proposals/admindetails', ['proposal' => $proposal]);
    }  
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
    // dead for now 
    // //GET the create new proposal form ('.../proposals/create')
    // public function create (Request $request, $id = null) {
    //     //if course id is not null, pull the course's data and prefill the proposal's variables.
    //     if ($id != null) {
    //         // $user = $request->user();
    //         $course = $request->user()->courses->find($id);
    //     //    dd($course->id);
    //         return view('proposals/create')->with('course', $course);
    //     }
    //     return view('proposals/create');
      
    // }   
        //GET the create new proposal form ('.../proposals/create')
        public function create (Request $request) {

            return view('proposals/create');
          
        }   
    
    //POST the form data to the proposals table (redirects to ('.../proposals')
    public function store(Request $request) {

        $user = $request->user();
        $request->validate([
            'proposed_term'=> 'required',
            'proposed_format' => 'required',
            'proposed_title' => 'required',   
            'proposed_course_description' => 'required',
        ]);
     
         # Note: If validation fails, it will automatically redirect the visitor back to the form page
         # and none of the code that follows will execute.
     
         # Code will eventually go here to add the book to the database,
         # but for now we'll just dump the form data to the page for proof of concept
        //  dump($request->all());

        $proposal = new Proposal();

        // $proposal->previous_term_code = null; 
        // $proposal->previous_crn = null; 
        // $proposal->subject_code = null; 
        // $proposal->college_code = null; 
        // $proposal->number = null; 
        // $proposal->course_id = null; 
        $proposal->user_id = $user->id;
        // $proposal->previous_schedule_type = null; 
        // $proposal->previous_format = null; 
        // $proposal->department_code = null; 
        // $proposal->previous_title =  null; 
        // $proposal->previous_note =  null; 
        // $proposal->previous_section_note = null; 
        // $proposal->previous_prerequisite = null;         
        // $proposal->previous_description =  null;     
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

        // dd($request->toArray());
    }   
    
    //GET for the reproposal form
    public function repropose (Request $request, $id) {
        $course = $request->user()->courses->find($id);

        return view('proposals/repropose', ['course' => $course]);
        
    }  
    //POST for reproposal form
    public function recreate(Request $request, $id) {

        $user = $request->user();
        // $request->validate([
        //     'proposed_term'=> 'required',
        //     'proposed_format' => 'required',
        //     'proposed_title' => 'required',   
        //     'proposed_course_description' => 'required',
        // ]);
        // if ($id != null) {
            $course = $request->user()->courses->find($id);
        // }
     
         # Note: If validation fails, it will automatically redirect the visitor back to the form page
         # and none of the code that follows will execute.
     
         # Code will eventually go here to add the book to the database,
         # but for now we'll just dump the form data to the page for proof of concept
        //  dump($request->all());

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


    //     $proposal->save();  
       
        $proposal->save(); 

        return redirect('/proposals')->with([
            'flash-alert' => 'Your proposal was created.'
        ]);

    }   
   //dead for now  
    // //POST the form data to the proposals table (redirects to ('.../proposals')
    // public function store(Request $request, $id = null) {
    //     if ($id != null) {
    //         $course = $request->user()->courses->find($id);
    //     }
    //     $user = $request->user();
    //     $request->validate(
    //         [
    //         'proposed_term ' => 'required',
    //         'proposed_format' => 'required',
    //         'proposed_title' => 'required',
    //         'proposed_course_description' => 'required',
    //         ]
    //     );

    //     $proposal = new Proposal();

    //     if($course) {
    //         $proposal->previous_term_code = $course->term_code ?? null;
    //         $proposal->previous_crn = $course->crn ?? null;
    //         $proposal->subject_code = $course->subject_code ?? null; 
    //         $proposal->college_code = $course->college_code ?? null;
    //         $proposal->number = $course->number ?? null;
    //         $proposal->course_id = $course->id ?? null;
    //         $proposal->previous_schedule_type = $course->schedule_type ?? null;
    //         $proposal->previous_format = $course->format ?? null;
    //         $proposal->department_code = $course->department_code ?? null;
    //         $proposal->previous_title =  $course->title ?? null;
    //         $proposal->previous_note =  $course->note ?? null;
    //         $proposal->previous_section_note = $course->section_note ?? null;
    //         $proposal->previous_prerequisite = $course->prerequisite ?? null;          
    //         $proposal->previous_description =  $course->description ?? null;
    //     }
        
    //     $proposal->user_id = $user->id;
    //     $proposal->proposed_term = $request->proposed_term;
    //     $proposal->proposed_format = $request->proposed_format;
    //     $proposal->proposed_title =  $request->proposed_title;
    //     $proposal->proposed_note =  $request->proposed_note;
    //     $proposal->proposed_section_note = $request->proposed_section_note;
    //     $proposal->proposed_prerequisite = $request->proposed_prerequisite;          
    //     $proposal->proposed_description =  $request->proposed_course_description;
    //     $proposal->proposed_comment = $request->proposed_comment; 

    //     $proposal->save();  

    //     // $action = new StoreNewBook((object) $request->all());
    //     return redirect('/proposals/create');
    //     // ->with(['flash-alert' => 'The book “'.$action->results->title.'” was added.']);
    // }   

}
