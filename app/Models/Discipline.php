<?php
namespace App\Models;

use App\AppModel;

class Discipline extends AppModel
{
    protected $fillable = [
        'discipline', 
		'code', 
		'icon', 
		'disp_image', 
        'description', 
    ];	
	
	public function program_disciplines(){
		return $this->hasMany(ProgramDiscipline::class);
	}
	
	public function discipline_branches(){
		return $this->hasMany(DisciplineBranch::class);
	}
	
	public function branches(){
		return $this->hasMany(Branch::class);
	}
	
	public function specializations(){
		return $this->hasMany(Specialization::class);
	}
	
	public function branch_specializations(){
		return $this->hasMany(BranchSpecialization::class)->where('course_id','<>',null);
	}
	public function country_state_specializations($country,$state){
		
		if(!empty($country) && empty($state))
			$universityIds=University::where('country_id',$country)->get()->pluck('id');
		else if(!empty($country) && !empty($state))
			$universityIds=University::where('country_id',$country)->where('state_id',$state)->get()->pluck('id');
		else 
			$universityIds=University::get()->pluck('id');
		return $this->hasMany(BranchSpecialization::class)->whereIn('university_id',$universityIds->toArray())->where('course_id','<>',null);
	}
	
	public function courses(){
		return $this->hasMany(Course::class);
	}
	
	public function program(){
		return $this->belongsTo(Program::class);
	}
	
	
}
