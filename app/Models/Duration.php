<?php
namespace App\Models;

use App\AppModel;

class Duration extends AppModel
{
     protected $fillable = [
        'duration', 
    ];	
	
	public function branch_specializations(){
		return $this->hasMany(BranchSpecialization::class);
	}
}
