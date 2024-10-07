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
        Schema::create('spc_semisters', function (Blueprint $table) {
            $table->id();
			$table->string('semister')->nullable();        		
			$table->string('app_start_date')->nullable();        		
			$table->string('app_end_date')->nullable();     		
			$table->string('university_early_decision_date')->nullable();        		
			$table->string('university_regular_decision_date')->nullable();        		
                   
			$table->foreignId('branch_specialization_id')->nullable();
			$table->foreign('branch_specialization_id')->references('id')->on('branch_specializations');
			
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
        Schema::dropIfExists('spc_semisters');
    }
};
