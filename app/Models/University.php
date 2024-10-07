<?php
namespace App\Models;

use App\AppModel;
class University extends AppModel
{
    protected $fillable = [
        'university', 
        'code', 
        'description', 
        'website',

		'world_ranking',
		'qs_ranking',
		'the_ranking',
		'country_ranking',
		
        'country_id',         
        'state_id',      
    ];	
	
	public function programs(){
		return $this->hasMany(Program::class);
	}
	public function campuses(){
		return $this->hasMany(Campus::class);
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
	public function specializations(){
		return $this->hasMany(Specialization::class);
	}
	public function branch_specializations(){
		return $this->hasMany(BranchSpecialization::class);
	}
	public function branches(){
		return $this->hasMany(Branch::class);
	}
	public function semisters(){
		return $this->hasMany(Semister::class);
	}
	public function getFormattedWebsiteAttribute(){
		
		$url=$this->website;
	
		  if(strpos($url, "https://") !== 0) {
			$url='https://'.$url;
		  }
	  
	   return $url;
	}
	
	
	public function getSemistersArray($sems){
		$sem=$this->semisters->toArray();		
		$semisters=[];		
		foreach($sems as $key1=>$value1){
			$semisters[$key1]=[];
			foreach($sem as $key2=>$value2){
				//var_dump($value2['semister']);die();
				if(!strcmp($value1,$value2['semister'])){
					$semisters[$key1]=$value2;
				}
			}
		}
	/* 	foreach($sems as $key=>$value){
		echo"<pre>";print_r($semisters[$key]);echo"</pre>";
		}die(); */
		return $semisters;
	}
	
	public function updateSemisters($semisters){
		if(!empty($semisters))
			foreach($semisters as $key=>$value){
					if(isset($semisters[$key]['id'])){
						if(isset($semisters[$key]['semister'])){
							$semister=Semister::findOrFail($semisters[$key]['id']);
							$semister->university_id = $this->id; 		
							$semister->semister = isset($semisters[$key]['semister'])?$semisters[$key]['semister']:null;        		
							$semister->app_start_date = $semisters[$key]['app_start_date']; 		
							$semister->app_end_date = $semisters[$key]['app_end_date']; 
							$semister->university_early_decision_date	= $semisters[$key]['university_early_decision_date']; 	
							$semister->university_regular_decision_date	= $semisters[$key]['university_regular_decision_date'];  	
							$semister->save();
						}else{
							$semister=Semister::findOrFail($semisters[$key]['id'])->forceDelete();
						}
					}else{
						if(isset($semisters[$key]['semister'])){
							$semister=new Semister();	
							$semister->university_id = $this->id; 		
							$semister->semister =isset($semisters[$key]['semister'])?$semisters[$key]['semister']:null;           		
							$semister->app_start_date = $semisters[$key]['app_start_date']; 		
							$semister->app_end_date = $semisters[$key]['app_end_date']; 
							$semister->university_early_decision_date	= $semisters[$key]['university_early_decision_date']; 	
							$semister->university_regular_decision_date	= $semisters[$key]['university_regular_decision_date'];  	
							$semister->save();
						}
					} 
			}
			
		//	return $semister;
	}
}
