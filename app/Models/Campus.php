<?php
namespace App\Models;

use App\AppModel;

class Campus extends AppModel
{
     protected $fillable = [
        'campus', 
        'code', 
        'description', 
        'website', 
        'address', 			
        'university_id',         
        'country_id',         
        'state_id',         
        'city_id',         
    ];	
	
	public function campus_programs(){
		return $this->hasMany(CampusProgram::class);
	}
	
	public function university(){
		return $this->belongsTo(University::class);
	}
	public function country(){
		return $this->belongsTo(Country::class);
	}
	
	public function state(){
		return $this->belongsTo(State::class);
	}
	
	public function city(){
		return $this->belongsTo(City::class);
	}
	
	public function disciplines(){
		return $this->hasMany(Discipline::class);
	}
	public function discipline_branches(){
		return $this->hasMany(DisciplineBranch::class);
	}
	public function program_disciplines(){
		return $this->hasMany(ProgramDiscipline::class);
	}
	public function specializations(){
		return $this->hasMany(Specialization::class);
	}
	public function branches(){
		return $this->hasMany(Branch::class);
	}
}
