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
        Schema::create('campus_programs', function (Blueprint $table) {
            $table->id();
			
			$table->foreignId('university_id');
			$table->foreign('university_id')->references('id')->on('universities');
			
			$table->foreignId('campus_id');
			$table->foreign('campus_id')->references('id')->on('campuses');
			
			$table->foreignId('program_id');
			$table->foreign('program_id')->references('id')->on('programs');
						
			$table->foreignId('created_by');
			$table->foreign('created_by')->references('id')->on('users');
			
			$table->foreignId('updated_by')->nullable();
			$table->foreign('updated_by')->references('id')->on('users');
        		
			$table->unique(['university_id','campus_id' , 'program_id']);	
			
			$table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campus_programs');
    }
};
