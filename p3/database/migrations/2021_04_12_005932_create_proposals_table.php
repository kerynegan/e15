<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedMediumInteger('previous_term_code')->nullable();
            $table->unsignedSmallInteger('previous_crn')->nullable();
            $table->char('subject_code', 4)->nullable();
            $table->char('college_code', 2)->nullable();
            $table->string('number', 7)->nullable();
            $table->foreignId('course_id')->nullable();
            $table->string('previous_schedule_type', 2)->nullable();
            $table->string('previous_format', 60)->nullable();
            $table->string('department_code', 4)->nullable();
            $table->string('previous_title', 135)->nullable();
            $table->text('previous_note')->nullable();
            $table->text('previous_section_note')->nullable();
            $table->text('previous_prerequisite')->nullable();
            $table->text('prevous_description')->nullable();
            $table->enum('proposed_term', ['fall', 'spring']);          
            $table->string('proposed_format', 60);
            $table->string('proposed_title', 135);
            $table->text('proposed_note')->nullable();
            $table->text('proposed_section_note')->nullable();
            $table->text('proposed_prerequisite')->nullable();
            $table->text('proposed_description');
            $table->text('proposed_comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
