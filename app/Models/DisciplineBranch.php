<?php
namespace App\Models;

use App\AppModel;

class DisciplineBranch extends AppModel
{
    public function discipline(){
		return $this->belongsTo(Discipline::class);
	}
	 public function branch(){
		return $this->belongsTo(Branch::class);
	}
	
	public function branch_specializations(){
		return $this->hasMany(BranchSpecialization::class);
	}
	public function campus(){
		return $this->belongsTo(Campus::class);
	}
	
	public function university(){
		return $this->belongsTo(University::class);
	}
	public function program_discipline(){
		return $this->belongsTo(ProgramDiscipline::class);
	}
	public function program(){
		return $this->belongsTo(Program::class);
	}
	public function getBranchSpecializationsArrayAttribute(){
		return $this->branch->specializations->pluck('specialization','id')->prepend('Select','');
	}
}
