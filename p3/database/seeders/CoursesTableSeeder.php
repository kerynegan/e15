<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Course; # Make our Course Model accessible
use Carbon\Carbon; # We’ll use this library to generate timestamps
use Faker\Factory; # We’ll use this library to generate random/fake data

class CoursesTableSeeder extends Seeder
{
    /**
     * This run method is the first method you should have in all your Seeder class files
     * This method will be invoked when we invoke this seeder
     * In this method you should put code that will cause data to be entered into your tables
     * (in this case, that's the `courses` table)
     */
    public function run()
    {
        # Three different examples of how to add courses
        //$this->addOneCourse();
        $this->addAllCoursesFromCoursesDotJsonFile();
        //$this->addRandomlyGeneratedCoursesUsingFaker();
    }



    /**
     *
     */
    private function addAllCoursesFromCoursesDotJsonFile()
    {
        $courseData = file_get_contents(database_path('courses.json'));
        $courses = json_decode($courseData, true);
    
        $count = count($courses);
        foreach ($courses as $slug => $courseData) {
            $course = new Course();

            # For the timestamps, we're using a class called Carbon that comes with Laravel
            # and provides many date/time methods.
            # Learn more: https://github.com/briannesbitt/Carbon
            $course->created_at = Carbon::now();
            $course->updated_at = Carbon::now();
            $course->term_code = $courseData['term_code'];
            $course->crn = $courseData['crn'];
            $course->subject_code = $courseData['subject_code'];
            $course->college_code = $courseData['college_code'];
            $course->number = $courseData['number'];
            // $course->user_id = $courseData['user_id'];
            $course->schedule_type = $courseData['schedule_type'];
            $course->format = $courseData['format'];
            $course->department_code = $courseData['department_code'];
            $course->title = $courseData['title'];
            $course->note = $courseData['note'];
            $course->section_note = $courseData['section_note'];
            $course->prerequisite = $courseData['prerequisite'];          
            $course->description = $courseData['description'];

            $course->save();
        }
    }
}