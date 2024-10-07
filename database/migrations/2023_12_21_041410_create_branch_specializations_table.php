<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('branch_specializations', function (Blueprint $table) {
            $table->id();
			$table->foreignId('discipline_branch_id')->nullable();
			$table->foreign('discipline_branch_id')->references('id')->on('discipline_branches');
			
			$table->string('apply_deadline'); 
			$table->string('start_date'); 
			$table->integer('acceptance_rate')->default(0); 
			$table->double('gpa_req_rate')->default(0.0); 
			$table->double('apply_fee')->default(0.0); 
			$table->string('scholorship'); 
			$table->string('course_rating')->nullable(); 
			$table->string('scholorship_link')->nullable();
			$table->string('curriculum_link')->nullable();
			$table->string('catalogue_link')->nullable();
			$table->string('entry_requirements_link')->nullable();
			$table->string('apply_link')->nullable();
			$table->string('status')->nullable();
			
			$table->foreignId('university_id');
			$table->foreign('university_id')->references('id')->on('universities');
		
			$table->foreignId('campus_id');
			$table->foreign('campus_id')->references('id')->on('campuses');
			
			$table->foreignId('program_id');
			$table->foreign('program_id')->references('id')->on('programs');
						
			$table->foreignId('discipline_id')->nullable();
			$table->foreign('discipline_id')->references('id')->on('disciplines');
	
			$table->foreignId('branch_id')->nullable();
			$table->foreign('branch_id')->references('id')->on('branches');
			
			$table->foreignId('attendance_id');
			$table->foreign('attendance_id')->references('id')->on('attendances');
						
			$table->foreignId('duration_id');
			$table->foreign('duration_id')->references('id')->on('durations');
			
			$table->foreignId('specialization_id')->nullable();
			$table->foreign('specialization_id')->references('id')->on('specializations');
			
			$table->foreignId('created_by');
			$table->foreign('created_by')->references('id')->on('users');
			
			$table->foreignId('updated_by')->nullable();
			$table->foreign('updated_by')->references('id')->on('users');
			
			$table->unique(['discipline_branch_id' ,'university_id','campus_id' , 'program_id', 'discipline_id', 'branch_id', 'attendance_id', 'duration_id', 'specialization_id'],'dsbr_uid_cmp_pr_dis_br_att_dur_sp_id');	
			
		    $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_specializations');
    }
};
