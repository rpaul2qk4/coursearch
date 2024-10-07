<?php

namespace App\Models;

use App\AppModel;

class Semister extends AppModel
{

   protected $fillable = [
        'university_id', 		
        'semister',        		
        'app_start_date', 		
        'app_end_date', 	
        'university_early_decision_date', 		
        'university_regular_decision_date',       
    ];	

	public function university(){
		return $this->belongsTo(University::class);
	}
}	