<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BookController extends Controller
{
    /**
    * GET /books/create
    * Display the form to add a new book
    */
    public function create(Request $request) 
    {
        return view('books/create');
    }


    /**
    * POST /books
    * Process the form for adding a new book
    */
    public function store(Request $request) 
    {
        # Code will eventually go here to add the book to the database, 
        # but for now we'll just dump the form data to the page for proof of concept
        dump($request->all());
    }

    /* Get /search
    search books based on title or author
     */
    public function search(Request $request)
    {
        $request->validate([
            'searchTerms' =>'required',
            'searchType' => 'required'
        ]);

        #if validation fails, redirect back to '/'
        
        $bookData = file_get_contents(database_path('books.json'));
        $books = json_decode($bookData, true);
        $searchResults = [];
        $searchTerms = $request->input('searchTerms', '');

        $searchType = $request->input('searchType', 'title');

        foreach($books as $slug => $book) {
            if(strtolower($book[$searchType]) === strtolower($searchTerms)) {
                $searchResults[$slug] = $book;
            }
        }
        return redirect('/')->with([
            'searchResults' =>$searchResults,
            'searchTerms' => $searchTerms,
            'searchType' => $searchType
            ])->withInput();

        # ======== Temporary code to explore $request ==========

        # Get all the properties and methods available in the $request object
        //dump($request); # Object of type Illuminate\Http\Request

        # Get the form data (array) from the $request object
        //dump($request->all()); # Equivalent of dump($_GET)

        # Get the form data from individual fields
        //dump($request->input('searchTerms'));
        //dump($request->input('searchType'));
    
        # Form data from individual fields can also be accessed via dynamic properties
        //dump($request->searchTerms);

        # Boolean to see if the request contains data for a particular field
        //dump($request->has('searchType'));
        
        # You can get more information about a request than just the data of the form, for example...
        //dump($request->path()); # "search"
        //dump($request->is('search')); # true
        //dump($request->is('books')); # false
        //dump($request->fullUrl()); # e.g. http://bookmark.loc search?searchTerms=Harry%20Potter&searchType=title
        //dump($request->method()); # GET
        //dump($request->isMethod('post')); # False

        # ======== End exploration of $request ==========
        return 'Process the search form...';
    }
    /**
     * GET /books
     * Show all the books
     */

    public function index()
    {
        // Hard-coded books for practice:
        // $books = [
        //     ['title' => 'War and Peace', 'author' => 'Leo Tolstoy'],
        //     ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald'],
        //     ['title' => 'I Know Why the Caged Bird Sings', 'author' => 'Maya Angelou'],
        // ];

        # Load our book data using PHP's file_get_contents
        # We specify our books.json file path using Laravel's database_path helper
        $bookData = file_get_contents(database_path('books.json'));
    
        # Convert the string of JSON text we loaded from books.json into an
        # array using PHP's built-in json_decode function
        $books = json_decode($bookData, true);

        # Alphabetize the books
        $books = Arr::sort($books, function ($value) {
            return $value['title'];
        });

        return view('books/index', ['books' => $books]);
    }

    /**
     * GET /books/{slug}
     * Show the details for an individual book
     */
    public function show($slug)
    {
        # Load our book data
        # TODO: This code is redundant with loading the books in the index method
        $bookData = file_get_contents(database_path('books.json'));
        $books = json_decode($bookData, true);

        # Narrow down our array of books
        $book = Arr::first($books, function ($value, $key) use ($slug) {
            return $key == $slug;
        });
        
        return view('books/show', [
            'book' => $book,
        ]);
    }

    /**
     * GET /list
     */
    public function list()
    {
        # TODO
        return view('books/list');
    }
}