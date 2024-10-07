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
        Schema::create('campuses', function (Blueprint $table) {
            $table->id();
			$table->string('campus'); 
			$table->string('code')->nullable();
			$table->string('icon')->nullable();
			$table->text('description')->nullable();
			$table->string('website'); 
			$table->string('address')->nullable(); 
				
			$table->foreignId('university_id');
			$table->foreign('university_id')->references('id')->on('universities');
			
			$table->foreignId('country_id');
			$table->foreign('country_id')->references('id')->on('countries');
			
			$table->foreignId('state_id');
			$table->foreign('state_id')->references('id')->on('states');
			
			$table->foreignId('city_id')->nullable();
			$table->foreign('city_id')->references('id')->on('cities');
			
			$table->foreignId('created_by');
			$table->foreign('created_by')->references('id')->on('users');
			
			$table->foreignId('updated_by')->nullable();
			$table->foreign('updated_by')->references('id')->on('users');
            
			$table->unique(['campus' , 'university_id', 'country_id', 'state_id']);
			
			$table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campuses');
    }
};
