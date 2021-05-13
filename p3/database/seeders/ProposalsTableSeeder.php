<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proposal;
use App\Models\Course;
use App\Models\User; 

use Carbon\Carbon; # We’ll use this library to generate timestamps
use Faker\Factory; # We’ll use this library to generate random/fake data

class ProposalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->seedByOldCourses();
        $this->seedWithFaker();
    }
    private function seedByOldCourses()
    {

        $course = new Course();
        $courses = $course->limit(40)->get();
    
        $count = count($courses);
        foreach ($courses as $course) {
            if($count%2 ==0){
                $randomterm = "fall";
            } else {
                $randomterm = "spring";
            }

            $proposal = new Proposal();

            $proposal->created_at = Carbon::now();
            $proposal->updated_at = Carbon::now();
            $proposal->previous_term_code = $course->term_code;
            $proposal->previous_crn = $course->crn;
            $proposal->subject_code = $course->subject_code;
            $proposal->college_code = $course->college_code;
            $proposal->number = $course->number;
            $proposal->course_id = $course->id;
            $proposal->user_id = $course->user_id;
            $proposal->previous_schedule_type = $course->schedule_type;
            $proposal->previous_format = $course->format;
            $proposal->department_code = $course->department_code;
            $proposal->previous_title =  $course->title;
            $proposal->previous_note =  $course->note;
            $proposal->previous_section_note = $course->section_note;
            $proposal->previous_prerequisite = $course->prerequisite;          
            $proposal->previous_description =  $course->description;
            $proposal->proposed_term = $randomterm;
            $proposal->proposed_format = $course->format;
            $proposal->proposed_title =  $course->title;
            $proposal->proposed_note =  $course->note;
            $proposal->proposed_section_note = $course->section_note;
            $proposal->proposed_prerequisite = $course->prerequisite;          
            $proposal->proposed_description =  $course->description;
            $proposal->proposed_comment = "Hope you approve my proposal! I love teaching at HESWEB U.";

            $proposal->save();   
        }
    }
    private function seedWithFaker()
    {
        # For this example, we'll generate random seed data using a package that
        # comes with Laravel called Faker: https://github.com/fzaninotto/Faker
        $faker = Factory::create();

        for ($i = 0; $i < 30; $i++) {
            $proposal = new Proposal();

            $proposal->created_at = Carbon::now();
            $proposal->updated_at = Carbon::now();
            $proposal->previous_term_code = null;
            $proposal->previous_crn = null;
            $proposal->subject_code = null;
            $proposal->college_code = null;
            $proposal->number = null;
            $proposal->course_id = null;
            $proposal->user_id = $faker->numberBetween($min = 1, $max = 10);
            $proposal->previous_schedule_type = null;
            $proposal->previous_format = null;
            $proposal->department_code =  null;
            $proposal->previous_title =   null;
            $proposal->previous_note =   null;
            $proposal->previous_section_note =  null;
            $proposal->previous_prerequisite =  null;          
            $proposal->previous_description =  null;
            $proposal->proposed_term = $faker->randomElement($array = array ('fall','spring'));
            $proposal->proposed_format = $faker->randomElement($array = array ('Harvard course', 'Live web conference', 'Replay', 'Pre-Developed', 'Live or on-demand web conference','Tutorial'));
            $proposal->proposed_title =  $faker->text($maxNbChars = 135);
            $proposal->proposed_note =  $faker->paragraphs($nb = 1, $asText = true);
            $proposal->proposed_section_note = $faker->paragraphs($nb = 1, $asText = true);
            $proposal->proposed_prerequisite = $faker->paragraphs($nb = 1, $asText = true);        
            $proposal->proposed_description =  $faker->paragraphs($nb = 1, $asText = true);
            $proposal->proposed_comment = $faker->paragraphs($nb = 1, $asText = true);

            $proposal->save();
        }
    }
}
