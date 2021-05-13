Notes to self for tomorrow
+ proposals can be associated with one course
+ proposals can be associated with one user
+ courses can be associated to one user
+ courses can be associated to many proposals
+ users can be associated to many courses
+ users can be associated to many proposals

# Project 3
+ By: Keryn Egan
+ Production URL: <http://e15p3.kerynegan.me>


## Feature summary
*Outline a summary of features that your application has. The following details are from a hypothetical project called "Movie Tracker". Note that it is similar to Bookmark, yet it has its own unique features. Delete this example and replace with your own feature summary*

+ Users (instructors) can register/log in.
+ Users can view in aggregate courses that they have previously taught (only their own courses).
+ Users can view in detailed mode courses that they have previously taught.
+ Users are restricted from accessing courses that they did not teach.
+ Users can create a proposal to teach a new course.
+ Users can repropose a course that they have taught previously.
+ Users can delete a proposal. 


+ Users can add/update/delete movies in their collection (title, release date, director, writer, summary, category)
+ There's a file uploader that's used to upload poster images for each movie
+ User's can toggle whether movies in their collection are public or private
+ Each user has a public profile page which presents a short bio about their movie tastes, as well as a list of public movies in their collection
+ Each user has their own account page where they can edit their bio, email, password
+ Users can clone movies from another user's public collection into their collection
+ The home page features
  + a stream of recently added public movies
  + a list of categories, with a link to each category that shows a page of movies (with links) within that category

  
## Database summary
*Describe the tables and relationships used in your database. Delete the examples below and replace with your own info.*

My application has 3 tables in total (`users`, `courses`, `proposals`)

+ There is a one-to-many relationship between `users` and `courses` 
  (a user may have taught many previous courses, but each course only has one instructor(user))
+ There is a one-to-many relationship between `users` and `proposals` 
  (a user can make many proposals, but each proposal is owned by one user)
+ There's a one-to-many relationship between `proposals` and `courses` 
  (a course can be proposed as new many times, but each proposal can only be (optionally) associated with one prior course)

## Outside resources
Note: I specifically used a curated JSON file isntead of the Faker data. It felt a little silly, but I liked the control, so here's the resources I used for those:
+ [Fake name + email address generator](https://homepage.net/name_generator/)
+ [Lorem ipsum generator](https://www.freeformatter.com/lorem-ipsum-generator.html)
+ [XLS to JSON](https://beautifytools.com/excel-to-json-converter.php)

+ [CSS gradient tool for page background](https://cssgradient.io/)


## Notes for instructor
I hope you like the styling for HESWEB U! The concept made me laugh, so it might amuse you, too. Especially the tagline in the footer :)

Thanks for a great term! I really enjoyed the content of both classes and seeing how the technologies work both on their own and together. 