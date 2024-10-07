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
        Schema::create('bank_loans', function (Blueprint $table) {
            $table->id();
			$table->string('bank_name');
			$table->double('loan_amount');
			$table->string('process_time');
			$table->double('interest_rate');
			$table->string('docs_type');
			$table->text('discription')->nullable();
			
			$table->foreignId('country_id');
			$table->foreign('country_id')->references('id')->on('countries');
			
			$table->foreignId('state_id')->nullable();
			$table->foreign('state_id')->references('id')->on('states');
			
			$table->foreignId('created_by');
			$table->foreign('created_by')->references('id')->on('users');
			
			$table->foreignId('updated_by')->nullable();
			$table->foreign('updated_by')->references('id')->on('users');
			$table->unique(['bank_name' , 'country_id', 'state_id']);	
		
			$table->softdeletes();
		    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_loans');
    }
};
