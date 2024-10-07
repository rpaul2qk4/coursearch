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
        Schema::create('standard_operating_procedures', function (Blueprint $table) {
            $table->id();
			$table->string('document')->nullable();
			$table->text('discription')->nullable();
			
			$table->foreignId('discipline_id');
			$table->foreign('discipline_id')->references('id')->on('disciplines');
						
			$table->foreignId('specialization_id');
			$table->foreign('specialization_id')->references('id')->on('specializations');
			
			$table->foreignId('country_id')->nullable();
			$table->foreign('country_id')->references('id')->on('countries');
			
			$table->foreignId('state_id')->nullable();
			$table->foreign('state_id')->references('id')->on('states');
			
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
        Schema::dropIfExists('standard_operating_procedures');
    }
};
