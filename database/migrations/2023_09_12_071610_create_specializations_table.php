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
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
			
			$table->string('specialization');
			$table->string('code')->nullable();
			$table->text('description')->nullable();				
						
			$table->foreignId('discipline_id')->nullable();
			$table->foreign('discipline_id')->references('id')->on('disciplines');
	
			$table->foreignId('branch_id')->nullable();
			$table->foreign('branch_id')->references('id')->on('branches');			
		
			$table->foreignId('created_by');
			$table->foreign('created_by')->references('id')->on('users');
			
			$table->foreignId('updated_by')->nullable();
			$table->foreign('updated_by')->references('id')->on('users');

			$table->unique(['specialization' , 'discipline_id', 'branch_id']);	
						
			$table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specializations');
    }
};
