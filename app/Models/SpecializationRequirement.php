<?php
namespace App\Models;

use App\AppModel;

class SpecializationRequirement extends AppModel
{
    protected $fillable = [
        'score', 
    ];	
	
	public function branch(){
		return $this->belongsTo(Branch::class);
	}
		
	public function discipline(){
		return $this->belongsTo(Discipline::class);
	}
	
	public function university(){
		return $this->belongsTo(University::class);
	}
	
	public function program(){
		return $this->belongsTo(Program::class);
	}
	public function attendance(){
		return $this->belongsTo(Attendance::class);
	}
	public function duration(){
		return $this->belongsTo(Duration::class);
	}
	
	public function specialization(){
		return $this->belongsTo(Specialization::class);
	}
	public function requirement(){
		return $this->belongsTo(Requirement::class);
	}
	public function specialization_fees(){
		return $this->hasMany(SpecializationFee::class);
	}
	
	public function getFeeDetailsAttribute(){
		return $this->specialization_fees;
	}
}
