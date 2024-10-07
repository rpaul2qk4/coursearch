<?php
namespace App\Models;

use App\AppModel;

class Requirement extends AppModel
{
    protected $fillable = [
        'requirement',
		'code', 
        'description', 		
    ];	
		
	
	public function branch_specialization_requirements(){
		return $this->hasMany(BranchSpecializationRequirement::class);
	}		
}
