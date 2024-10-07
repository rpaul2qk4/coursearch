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
        Schema::create('visa_processes', function (Blueprint $table) {
            $table->id();
			$table->text('discription')->nullable();
			$table->foreignId('user_id')->nullable();
			$table->foreign('user_id')->references('id')->on('users');
			
			$table->foreignId('country_id');
			$table->foreign('country_id')->references('id')->on('countries');
			
			$table->foreignId('state_id')->nullable();;
			$table->foreign('state_id')->references('id')->on('states');
			
			$table->foreignId('created_by');
			$table->foreign('created_by')->references('id')->on('users');
			
			$table->foreignId('updated_by')->nullable();
			$table->foreign('updated_by')->references('id')->on('users');
			$table->unique(['user_id' , 'country_id']);	
		
			$table->softdeletes();
		    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_processes');
    }
};
