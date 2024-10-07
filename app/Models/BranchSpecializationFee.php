<?php
namespace App\Models;

use App\AppModel;

class BranchSpecializationFee extends AppModel
{
    protected $fillable = [
        'fees',		
        'course_fees',		
        'format_id',		
    ];	
	
	public function branch_specialization(){
		return $this->belongsTo(BranchSpecialization::class);
	}
	public function course(){
		return $this->belongsTo(Course::class);
	}
	public function format(){
		return $this->belongsTo(Format::class);
	}
	
}
