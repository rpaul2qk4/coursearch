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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
			$table->string('city');
			$table->string('code')->nullable();
		    $table->foreignId('country_id')->nullable();
			$table->foreign('country_id')->references('id')->on('countries');
	        $table->foreignId('state_id')->nullable();
			$table->foreign('state_id')->references('id')->on('states');
			
			$table->foreignId('created_by')->nullable();
			$table->foreign('created_by')->references('id')->on('users');
			
			$table->foreignId('updated_by')->nullable();
			$table->foreign('updated_by')->references('id')->on('users');
			
			$table->unique(['city' , 'country_id', 'state_id']);
			
		    $table->softdeletes();
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
