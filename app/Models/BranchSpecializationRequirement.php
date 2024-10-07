<?php
namespace App\Models;

use App\AppModel;

class BranchSpecializationRequirement extends AppModel
{
    protected $fillable = [
        'score', 
    ];	
	
	public function branch(){
		return $this->belongsTo(Branch::class);
	}
	public function course(){
		return $this->belongsTo(Course::class);
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
	public function branch_specialization(){
		return $this->belongsTo(BranchSpecialization::class,'id','branch_sp_id');
	}
	public function branch_specialization_fee(){
		return $this->belongsTo(BranchSpecializationFee::class);
	}
	public function requirement(){
		return $this->belongsTo(Requirement::class);
	}
		
	public function getFeeDetailsAttribute(){
		return $this->branch_specialization_fees;
	}
	
	
	public function getSpecifiedRequirementScore($req){
		$requirements=Requirement::whereIn('requirement',['TOEFL','IELTS','PTE','GRE'])->get()->pluck('requirement','id')->toArray();
		
		if($req==$requirements[$this->requirement_id])
			return $this->score;
		else
			return 'NA';
	
	}
}
