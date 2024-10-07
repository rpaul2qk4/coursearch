<?php
namespace App\Models;

use App\AppModel;

class Course extends AppModel
{
    protected $fillable = [
        'course', 
		'code',
		'description'
    ];	
	
	public function specialization(){
		return $this->belongsTo(Specialization::class);
	}

	public function branch_specializations(){
		return $this->hasMany(BranchSpecialization::class);
	}	
	
	public function branch_specialization_fees(){
		return $this->hasMany(BranchSpecializationFee::class);
	}
	
	public function branch_specialization_requirements(){
		return $this->hasMany(BranchSpecializationRequirement::class);
	}
	
}
