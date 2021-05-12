<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class PracticeController extends Controller
{
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