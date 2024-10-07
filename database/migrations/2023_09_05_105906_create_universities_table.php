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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
			$table->string('university'); 
			$table->string('code')->nullable();
			$table->string('icon')->nullable();
			$table->text('description')->nullable();
			$table->string('website'); 
			$table->string('address')->nullable(); 
			
			$table->integer('world_ranking')->default(0);
			$table->integer('country_ranking')->default(0);
			
			$table->foreignId('country_id');
			$table->foreign('country_id')->references('id')->on('countries');
			
			$table->foreignId('state_id');
			$table->foreign('state_id')->references('id')->on('states');
			
			$table->foreignId('created_by');
			$table->foreign('created_by')->references('id')->on('users');
			
			$table->foreignId('updated_by')->nullable();
			$table->foreign('updated_by')->references('id')->on('users');
            
			$table->unique(['university' , 'country_id', 'state_id']);
			
			$table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
