<?php
namespace App\Models;

use App\AppModel;

class Attendance extends AppModel
{
	protected $fillable = [
        'attendance', 
    ];	
	
	public function branch_specializations(){
		return $this->hasMany(BranchSpecialization::class);
	}
}
