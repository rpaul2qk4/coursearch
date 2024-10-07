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
        Schema::create('specialization_requirements', function (Blueprint $table) {
            $table->id();
				
			$table->integer('score')->default(0);
			$table->foreignId('specialization_id');
			$table->foreign('specialization_id')->references('id')->on('specializations');
		
			$table->foreignId('requirement_id');
			$table->foreign('requirement_id')->references('id')->on('requirements');
		
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
		
			$table->foreignId('created_by');
			$table->foreign('created_by')->references('id')->on('users');
			
			$table->foreignId('updated_by')->nullable();
			$table->foreign('updated_by')->references('id')->on('users');

			$table->softdeletes();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialization_requirements');
    }
};
