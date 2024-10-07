<?php
namespace App\Models;

use App\AppModel;

class Format extends AppModel
{
    protected $fillable = [
        'format', 
    ];	
	
	public function specializations(){
		return $this->hasMany(Specialization::class);
	}
	public function branh_specialization_fees(){
		return $this->hasMany(BranchSpecializationFee::class);
	}
}
