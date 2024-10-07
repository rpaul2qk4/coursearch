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
        Schema::create('program_disciplines', function (Blueprint $table) {
            $table->id();			
						
			$table->foreignId('campus_program_id');
			$table->foreign('campus_program_id')->references('id')->on('campus_programs');
			
			$table->foreignId('university_id');
			$table->foreign('university_id')->references('id')->on('universities');
						
			$table->foreignId('campus_id');
			$table->foreign('campus_id')->references('id')->on('campuses');
			
			$table->foreignId('program_id');
			$table->foreign('program_id')->references('id')->on('programs');
					
			$table->foreignId('discipline_id')->nullable();
			$table->foreign('discipline_id')->references('id')->on('disciplines');
		
			$table->foreignId('created_by');
			$table->foreign('created_by')->references('id')->on('users');
			
			$table->foreignId('updated_by')->nullable();
			$table->foreign('updated_by')->references('id')->on('users');
           	
			$table->unique(['campus_program_id' ,'university_id','campus_id' , 'program_id', 'discipline_id'],'cmpspr_un_cmps_prg_dis_id');	
			
			$table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_disciplines');
    }
};
