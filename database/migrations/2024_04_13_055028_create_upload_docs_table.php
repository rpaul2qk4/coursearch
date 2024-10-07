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
        Schema::create('upload_docs', function (Blueprint $table) {
            $table->id();
			$table->string('document')->nullable();
			$table->string('doc_type')->nullable();
			
			$table->foreignId('bank_loan_id')->nullable();
			$table->foreign('bank_loan_id')->references('id')->on('bank_loans');
						
			$table->foreignId('visa_process_id')->nullable();
			$table->foreign('visa_process_id')->references('id')->on('visa_processes');
			
			$table->foreignId('scholorship_id')->nullable();
			$table->foreign('scholorship_id')->references('id')->on('scholorships');
						
			$table->foreignId('standard_operating_procedure_id')->nullable();
			$table->foreign('standard_operating_procedure_id')->references('id')->on('standard_operating_procedures');
						
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
        Schema::dropIfExists('upload_docs');
    }
};
