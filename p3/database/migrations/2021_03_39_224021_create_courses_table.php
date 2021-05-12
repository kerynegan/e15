<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedMediumInteger('term_code');
            $table->unsignedSmallInteger('crn');
            $table->char('subject_code', 4);
            $table->char('college_code', 2);
            $table->string('number', 7);
            // $table->foreignId('user_id');
            $table->string('schedule_type', 2);
            $table->string('format', 60);
            $table->string('department_code', 4);
            $table->string('title', 135);
            $table->text('note')->nullable();
            $table->text('section_note')->nullable();
            $table->text('prerequisite')->nullable();
            $table->text('description');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
