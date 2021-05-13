<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PracticeController extends Controller
{   

        //course + instructors
        public function practice10(Request $request)
        {
            # Eager load the author with the book
            $proposals = Proposal::with('user')->get();
    
            // foreach ($courses as $course) {
            //     if ($course->user) {
            //         dump($course->user->first_name.' '.$course->user->last_name.' taught '.$course->subject_code . ' ' . $course->college_code . $course->number);
            //     } else {
            //         dump($course->$course->subject_code . ' ' . $course->college_code . $course->number. ' has no instructor associated with it.');
            //     }
            // }
    
            dump($proposals->toArray());
        }
    public function practice9(Request $request)
    {
        // $user = Auth::user();

        // dump($user->first_name.' has taught the following courses: ');
    
        $role = Auth::user()->role;
        dd($role);
    }
    //course + instructors
    public function practice8(Request $request)
    {
        # Eager load the author with the book
        $courses = Course::with('user')->get();

        foreach ($courses as $course) {
            if ($course->user) {
                dump($course->user->first_name.' '.$course->user->last_name.' taught '.$course->subject_code . ' ' . $course->college_code . $course->number);
            } else {
                dump($course->$course->subject_code . ' ' . $course->college_code . $course->number. ' has no instructor associated with it.');
            }
        }

        dump($courses->toArray());
    }
    public function practice7(Request $request)
    {
        $user = User::where('email', '=', 'jill@harvard.edu')->first();

        dump($user->first_name.' has taught the following courses: ');
    
        # Note how we can treate the `books` relationship as a dynamic propert ($user->books)
        foreach ($user->courses as $course) {
            dump($course->subject_code . ' ' . $course->college_code . $course->number);
        }
    }
    public function practice6(Request $request)
    {
        # Retrieve the currently authenticated user via the Auth facade
        $user = Auth::user();
        dump($user->toArray());

        # Retrieve the currently authenticated user via request object
        $user = $request->user();
        dump($user->toArray());

        # Check if the user is logged in
        if (Auth::check()) {
            dump('The user ID is '.Auth::id());
        }
    }
    public function practice5()
    {
        //find (where) x OR (where) y
        $course = Course::where('subject_code', 'LIKE', "BIOS")->first();
        if(!$course){
            dump("course not found, cannot update");
        } else{

            $course->delete();
            dump($course->title . " was deleted");
        //     foreach($courses as $course){
        //         dump($course->title);
        // }
        }
    }
    // https://hesweb.dev/e15/notes/laravel/db-query-examples

    //->get() when expecting multiple requests (returns collection)
    
    //->first() when expecting only one result (returns instance of book class)

    //use query $course = Course::where('subject_code', 'LIKE', "BIOS")->first(); for updating, rather than instance of new course

    public function practice4()
    {
        //find (where) x OR (where) y
        $course = Course::where('subject_code', 'LIKE', "BIOS")->first();
        if(!$course){
            dump("course not found, cannot update");
        } else{
            $course->title = "A VERY cool Biology course";
            $course->save();
            dump($course);
        //     foreach($courses as $course){
        //         dump($course->title);
        // }
        }
    }
    public function practice3()
    {
        //find (where) x OR (where) y
        $course = new Course();
        $courses = $course->where('subject_code', 'LIKE', "BIOS")->orWhere('number', ">=", 130) ->get();
        if($courses->isEmpty()){
            dump("no courses found");
        } else{
            dump($courses->toArray());
        //     foreach($courses as $course){
        //         dump($course->title);
        // }
        }
    }
    public function practice2()
    {
        //find where x AND y
        $course = new Course();
        $courses = $course->where('subject_code', 'LIKE', "BIOS")->where('number', ">=", 130) ->get();
        if($courses->isEmpty()){
            dump("no courses found");
        } else{
            dump($courses->toArray());
        //     foreach($courses as $course){
        //         dump($course->title);
        // }
        }
    }

    /**
     * First practice example
     * GET /practice/1
     */
    public function practice1()
    {
        dump(Course::all()->toArray());
    }

    /**
     * ANY (GET/POST/PUT/DELETE)
     * /practice/{n?}
     * This method accepts all requests to /practice/ and
     * invokes the appropriate method.
     * http://e15bookmark.loc/practice => Shows a listing of all practice routes
     * http://e15bookmark.loc/practice/1 => Invokes practice1
     * http://e15bookmark.loc/practice/5 => Invokes practice5
     * http://e15bookmark.loc/practice/999 => 404 not found
     */
    public function index(Request $request, $n = null)
    {
        $methods = [];

        # Load the requested `practiceN` method
        if (!is_null($n)) {
            $method = 'practice' . $n; # practice1

            # Invoke the requested method if it exists; if not, throw a 404 error
            return (method_exists($this, $method)) ? $this->$method($request) : abort(404);
        } # If no `n` is specified, show index of all available methods
        else {
            # Build an array of all methods in this class that start with `practice`
            foreach (get_class_methods($this) as $method) {
                if (strstr($method, 'practice')) {
                    $methods[] = $method;
                }
            }

            # Load the view and pass it the array of methods
            return view('practice')->with(['methods' => $methods]);
        }
    }
}