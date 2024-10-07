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
        Schema::create('specialization_fees', function (Blueprint $table) {
            $table->id();
			
			$table->double('fees')->default(0.0);
			$table->double('appl_fees')->default(0.0);
			$table->string('status')->nullable();
			
			$table->foreignId('format_id');
			$table->foreign('format_id')->references('id')->on('formats');
			
			$table->foreignId('specialization_id');
			$table->foreign('specialization_id')->references('id')->on('specializations');
		
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
        Schema::dropIfExists('specialization_fees');
    }
};
