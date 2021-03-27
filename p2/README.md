# Project 2
+ By: Keryn Egan
+ Production URL: <[http://e15p2.kerynegan.me](http://e15p2.kerynegan.me)

## Outside resources
### Functionality 
+ [random_int function](https://www.php.net/manual/en/function.random-int.php), [ASCII table](https://www.man7.org/linux/man-pages/man7/ascii.7.html) and [chr function](https://www.php.net/manual/en/function.chr.php) for adding random letters to the end of the message string.
+ [Array_reverse](https://www.php.net/manual/en/function.array-reverse.php)
+ [Stackoverflow: Textareas and keeping old values on refresh](https://stackoverflow.com/questions/23327845/laravel-textarea-does-not-refill-when-using-inputold)


### Styling
+ [CSS tables side-by-side](https://www.w3schools.com/howto/howto_css_table_side_by_side.asp)

## Notes for instructor
+ I realize that because the output is, by nature, gibberish/encoded, it may be difficult to know whether the code is working as expected! To make grading a bit easier. I created a document with expected outputs for an example message, each manually written (not by the code, to ensure they're right), located at [/assets/examples.pdf](http://e15p2.kerynegan.me/assets/examples.pdf) 
+ Ideally I would have created this using POST and not GET (encoded messages aren't helpful if they're just open to the public). But I had a lot of trouble writing the output to the page using POST from the examples given in class (I could dump it, but not get blade to return the output written to the page), and so I moved this to the GET with redirect method used in the search functionality. I have the feeling from the lecture that more information on how to post the data from a form to a database is coming, so I expect this will change in the future.