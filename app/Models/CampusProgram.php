<?php
namespace App\Models;

use App\AppModel;

class CampusProgram extends AppModel
{
   	
	
	public function program_disciplines(){
		return $this->hasMany(ProgramDiscipline::class);
	}
	public function program(){
		return $this->belongsTo(Program::class);
	}
	
	public function campus(){
		return $this->belongsTo(Campus::class);
	}
	
}
