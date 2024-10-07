<?php
namespace App\Models;

use App\AppModel;

class Specialization extends AppModel
{
    protected $fillable = [
        'specialization', 
		'code', 
        'sp_pdf',
        'description',
    ];	
	
	public function branch(){
		return $this->belongsTo(Branch::class);
	}
	public function courses(){
		return $this->hasMany(Course::class);
	}
		
	public function discipline(){
		return $this->belongsTo(Discipline::class);
	}
	public function campus(){
		return $this->belongsTo(Campus::class);
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
	
	public function branch_specialization_fees(){
		return $this->hasMany(BranchSpecializationFee::class);
	}
	public function branch_specializations(){
		return $this->hasMany(BranchSpecialization::class)->where('course_id','<>',null);
	}
	public function specialization_fees(){
		return $this->hasMany(SpecializationFee::class);
	}
	public function branch_specialization_requirements(){
		return $this->hasMany(BranchSpecializationRequirement::class);
	}
	public function specialization_requirements(){
		return $this->hasMany(SpecializationRequirement::class);
	}
	
	public function getFeeDetailsAttribute(){
		return $this->specialization_fees;
	}
	public function getSplRequirementsAttribute(){
		return $this->specialization_requirements->pluck('requirement_id')->toArray();
	}
	public function getSplReqsAttribute(){
		return $this->specialization_requirements->pluck('score','requirement_id');
	}
		
	public function getSpFormatAttribute(){
		return $this->specialization_fees->pluck('format_id')->toArray();
	}
	
	public function getSpFeesAttribute(){
		return $this->specialization_fees->pluck('fees','format_id');
	}
	
	
}
