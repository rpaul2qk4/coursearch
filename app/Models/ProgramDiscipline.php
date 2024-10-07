<?php
namespace App\Models;

use App\AppModel;

class ProgramDiscipline extends AppModel
{
  
	public function campus_program(){
		return $this->belongsTo(CampusProgram::class);
	}
	public function campus(){
		return $this->belongsTo(Campus::class);
	}	
	public function program(){
		return $this->belongsTo(Program::class);
	}
	public function discipline(){
		return $this->belongsTo(Discipline::class);
	}
	public function discipline_branches(){
		return $this->hasMany(DisciplineBranch::class);
	}
	
}
