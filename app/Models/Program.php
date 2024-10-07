<?php
namespace App\Models;

use App\AppModel;

class Program extends AppModel
{
     protected $fillable = [
        'program',
		'code', 
        'description', 		
    ];	
	
	public function university(){
		return $this->belongsTo(University::class);
	}
	
	public function campus(){
		return $this->belongsTo(Campus::class);
	}
	
	public function campus_programs(){
		return $this->hasMany(CampusProgram::class);
	}
	
	public function program_disciplines(){
		return $this->hasMany(ProgramDiscipline::class);
	}
	public function branch_specializations(){
		return $this->hasMany(BranchSpecialization::class);
	}
	public function discipline_branches(){
		return $this->hasMany(DisciplineBranch::class);
	}
		
}
