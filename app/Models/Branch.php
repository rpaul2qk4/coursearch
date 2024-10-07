<?php
namespace App\Models;

use App\AppModel;

class Branch extends AppModel
{
    protected $fillable = [
        'branch', 
		'code', 
        'description', 
    ];	
	
	public function discipline(){
		return $this->belongsTo(Discipline::class);
	}
	
	public function discipline_branches(){
		return $this->hasMany(DisciplineBranch::class);
	}
	public function specializations(){
		return $this->hasMany(Specialization::class);
	}
	public function branch_specializations(){
		return $this->hasMany(BranchSpecialization::class);
	}
	public function university(){
		return $this->belongsTo(University::class);
	}
	public function getSpecializationsArrayAttribute(){
		return $this->specializations()->pluck('specialization','id')->prepend('Select');
	}
}
