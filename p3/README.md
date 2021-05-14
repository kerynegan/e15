
# Project 3
+ By: Keryn Egan
+ Production URL: <http://e15p3.kerynegan.me>


## Feature summary
+ Users (instructors) can register/log in.
+ Users can view in aggregate courses that they have previously taught (only their own courses).
+ Users can view in detailed mode courses that they have previously taught.
+ Users are restricted from accessing courses that they did not teach using Auth middleware routes
+ Users can create a proposal to teach a new course.
+ Users can repropose a course that they have taught previously.
+ Users can delete a proposal. 
+ Admin (users with the users->role = 'admin') can access all proposals regardless of who created it via a tiny Middleware I wrote (Middleware\AdminAccessKE.php)
+ Admin can view in detailed mode proposals that are not theirs via the same Middleware.
+ The Middleware prevents non-admin (other users are seeded to basic 'instructor' roles) from accessing those pages.
  
## Database summary
My application has 3 tables in total (`users`, `courses`, `proposals`)

+ There is a one-to-many relationship between `users` and `courses` 
  (a user may have taught many previous courses, but each course only has one instructor(user))
+ There is a one-to-many relationship between `users` and `proposals` 
  (a user can make many proposals, but each proposal is owned by one user.)
+ There is no table relationship between `proposals` and `courses`. 
  (I used courses as a seed for some proposal data if the course is being reproposed, but did not want to persist a relationship between the two tables.)

## Outside resources
Note: I specifically used a curated JSON file for the courses isntead of using the Faker data. It felt a little silly, but I liked the control at first, so here's the resources I used for those:
+ [Lorem ipsum generator](https://www.freeformatter.com/lorem-ipsum-generator.html)
+ [XLS to JSON](https://beautifytools.com/excel-to-json-converter.php)

I later came around on Faker and used it for seeding some new proposals.

### Other resources
+ [CSS gradient tool for page background](https://cssgradient.io/)
+ [Dusk selector error fixed by updating APP_URL from localhost to http://e15p3.loc/ ](https://stackoverflow.com/questions/48567518/laravel-dusk-nosuchelementexception-unable-to-locate-element)
+ [Modified this Canva template for the logo](https://www.canva.com/templates/EADhqLkLnzk-green-and-blue-community-college-logo/)
+ [Panicked search for rolling back my git repo because I installed Bouncer right into my P3 instead of testing it elsewhere first](https://stackoverflow.com/questions/4114095/how-do-i-revert-a-git-repository-to-a-previous-commit)
+ [Creating my own simple route guard for user roles](https://stackoverflow.com/questions/52901316/laravel-give-user-access-to-specific-route-when-conditions-are-met)
+ [PHP Docs Capitalize first word](https://www.php.net/manual/en/function.ucfirst.php)
+ [.env DEBUGBAR_ENABLED=false. See below note for why](https://stackoverflow.com/questions/48220709/how-to-safely-remove-laravel-debugbar/52528002)


## Notes for instructor
+ ADMIN: Jill@harvard.edu is an admin and also has previous courses/proposals of her own.
+ USER: Jamal@harvard.edu is only an instructor/user He should not have access to admin pages.

+ DUSK note: This is going to sound crazy, but a tests of my reproposal form kept failing because the Laravel Debug tool was intercepting the click meant for the submit button! In my .env file I added "DEBUGBAR_ENABLED=false" and it finally fixed the problem and let my tests pass. 

```
Facebook\WebDriver\Exception\ElementClickInterceptedException: element click intercepted: Element <button type="submit" dusk="add-proposal-button" class="btn btn-primary yes">...</button> is not clickable at point (831, 891). Other element would receive the click: <div class="phpdebugbar-header">...</div>
```

I hope you like the styling for HESWEB U! The concept made me laugh, so it might amuse you, too. Especially the tagline in the footer :)

Thanks for a great term! I really enjoyed the content of both classes and seeing how the technologies work both on their own and together. 