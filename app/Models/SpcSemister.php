<?php

namespace App\Models;

use App\AppModel;

class SpcSemister extends AppModel
{

   protected $table='spc_semisters';
   protected $fillable = [
        'branch_specialization_id', 		
        'semister',        		
        'app_start_date', 		
        'app_end_date', 	
        'university_early_decision_date', 		
        'university_regular_decision_date',       
    ];	

	public function branch_specialization(){
		return $this->belongsTo(BranchSpecialization::class);
	}
}	