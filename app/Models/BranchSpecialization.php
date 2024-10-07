<?php
namespace App\Models;

use App\AppModel;

class BranchSpecialization extends AppModel
{   	
	 protected $fillable = [
        'apply_deadline', 
        'start_date', 
        'acceptance_rate', 
        'gpa_req_rate', 
        'scholorship',        
		'scholorship_link',
		'curriculum_link',
		'catalogue_link',
		'entry_requirements_link',
		'apply_link',			
		'apply_fee',	
		'course_ranking',	
				
    ];	
	
	public function branch(){
		return $this->belongsTo(Branch::class);
	}
		
	public function discipline_branch(){
		return $this->belongsTo(DisciplineBranch::class);
	}	
	public function specialization(){
		return $this->belongsTo(Specialization::class);
	}	
	public function course(){
		return $this->belongsTo(Course::class);
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
	public function branch_specialization_requirements(){
		return $this->hasMany(BranchSpecializationRequirement::class,'branch_sp_id','id');
	}
	
	public function getFeeDetailsAttribute(){
		return $this->branch_specialization_fees;
	}
	public function getSplRequirementsAttribute(){
		return $this->branch_specialization_requirements->pluck('requirement_id')->toArray();
	}
	public function getSplReqsAttribute(){
		return $this->branch_specialization_requirements->pluck('score','requirement_id');
	}
	public function getSplReqmsAttribute(){
		return $this->branch_specialization_requirements->pluck('score','requirement_id')->toArray();
	}
		
	public function getSpFormatAttribute(){
		return $this->branch_specialization_fees->pluck('format_id')->toArray();
	}
	
	public function getSpFeesAttribute(){
		return $this->branch_specialization_fees->pluck('fees','format_id');
	}
	public function getCountryCurrencyAttribute(){
		return $this->university->country->currency;
	}
	
	public function getSpecializationBranchAttribute(){
		if(!empty($this->branch_id))
			return $this->branch->branch;
		else
			return '***';
	}
	
	public function country_state_dis_specs($discipline,$country,$state){
		
		if(!empty($country) ){
			
			if(!empty($state))
				$universityIds=University::where('country_id',$country)->whereAnd('state_id',$state)->get()->pluck('id');
			else
				$universityIds=University::where('country_id',$country)->get()->pluck('id');
			
		}else 
			$universityIds=University::get()->pluck('id');
		
		$crsids=BranchSpecialization::whereIn('university_id',$universityIds->toArray())->where('discipline_id',$discipline)->where('course_id','<>',null)->get()->pluck('course_id')->unique();
		return Course::whereIn('id',$crsids->toArray())->get()->count();
	}
	
	
		
	/* public function getSpecifiedRequirementsAttribute(){
		
		
		$requirements=Requirement::whereIn('requirement',['TOEFL','IELTS','PTE','GRE'])->get()->pluck('requirement','id')->toArray();
		//p($requirements);
		$br_spec_reqs_ids=$this->branch_specialization_requirements->pluck('requirement_id')->toArray();
		
		ep( $this->branch_specialization_requirements->pluck('requirement_id')->toArray());
		if(!empty($this->branch_specialization_requirements))
			return $this->branch->branch;
		else
			return '***';
	} */
	
	public function getSpecializationBranchCodeAttribute(){
		if(!empty($this->branch_id))
			return $this->branch->code;
		else
			return '***';
	}
	
	public function remove_http($url) {
	   $disallowed = array('http://', 'https://');
	   foreach($disallowed as $d) {
		  if(strpos($url, $d) === 0) {
			 return str_replace($d, '', $url);
		  }
	   }
	   return $url;
	}
	
	public function getSpecifiedRequirementText($req){
		
		$score='NA';
		
		foreach($this->branch_specialization_requirements as $branch_specialization_requirement){ 
			if(!strcmp($branch_specialization_requirement->requirement->requirement,$req)){			
				$score = $branch_specialization_requirement->score;
			}
		}				
			
		if($score!='NA')
			
			return $score;
		
		return $score;
	}
	
	public function spc_semisters(){
		return $this->hasMany(SpcSemister::class);
	}
	
	public function getSemistersArray($sems){
		$sem=$this->spc_semisters;		
		$semisters=[];	
		//p($sem);	
		foreach($sems as $key1=>$value1){
			$semisters[$key1]=[];
			foreach($sem as $key2=>$value2){
				//var_dump($value2['semister']);die();
				if(!strcmp($value1,$value2['semister'])){
					$semisters[$key1]=$value2;
				}
			}
		}
		
	/*	foreach($sems as $key=>$value){
		echo"<pre>";print_r($semisters[$key]);echo"</pre>";
		}die(); */ 
		return $semisters;
	}
	
	public function updateSemisters($semisters){
		if(!empty($semisters))
			foreach($semisters as $key=>$value){
					if(isset($semisters[$key]['id'])){
						if(isset($semisters[$key]['semister'])){
							$semister=SpcSemister::findOrFail($semisters[$key]['id']);
							$semister->branch_specialization_id = $this->id; 		
							$semister->semister = isset($semisters[$key]['semister'])?$semisters[$key]['semister']:null;        		
							$semister->app_start_date = $semisters[$key]['app_start_date']; 		
							$semister->app_end_date = $semisters[$key]['app_end_date']; 
							$semister->university_early_decision_date	= $semisters[$key]['university_early_decision_date']; 	
							$semister->university_regular_decision_date	= $semisters[$key]['university_regular_decision_date'];  	
							$semister->save();
						}else{
							$semister=SpcSemister::findOrFail($semisters[$key]['id'])->forceDelete();
						}
					}else{
						if(isset($semisters[$key]['semister'])){
							$semister=new SpcSemister();	
							$semister->branch_specialization_id = $this->id; 		
							$semister->semister =isset($semisters[$key]['semister'])?$semisters[$key]['semister']:null;           		
							$semister->app_start_date = $semisters[$key]['app_start_date']; 		
							$semister->app_end_date = $semisters[$key]['app_end_date']; 
							$semister->university_early_decision_date	= $semisters[$key]['university_early_decision_date']; 	
							$semister->university_regular_decision_date	= $semisters[$key]['university_regular_decision_date'];  	
							$semister->save();
						}
					} 
			}
	}
}
