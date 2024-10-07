<?php
namespace App\Models;

use App\AppModel;

class SpecializationFee extends AppModel
{
       protected $fillable = [
        'fees',		
        'course_fees',		
        'format_id',		
    ];	
	
	public function specialization(){
		return $this->belongsTo(Specialization::class);
	}
	public function format(){
		return $this->belongsTo(Format::class);
	}
	
}
