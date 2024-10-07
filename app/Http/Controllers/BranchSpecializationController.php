<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Branch;
use App\Models\State;
use App\Models\SpcSemister;
use App\Models\University;
use App\Models\DisciplineBranch;
use App\Models\BranchSpecialization;
use App\Models\Specialization;
use App\Models\BranchSpecializationRequirement;
use App\Models\SpecializationRequirement;
use App\Models\SpecializationFee;
use App\Models\BranchSpecializationFee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecializationRequest;
use App\Http\Requests\UpdateSpecializationRequest;
use Illuminate\Http\Request;
use App\Helpers\AppHelper;

class BranchSpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
		$discipline_branch=DisciplineBranch::findOrFail($id);
		//p($discipline_branch);
        return view('branch_specializations.index',compact(['discipline_branch']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
		$discipline_branch=DisciplineBranch::findOrFail($id);
        return view('branch_specializations.create',compact(['discipline_branch']));
    }
	
	public function getCourses($id)
    {
		$specialization=Specialization::findOrFail($id);
		
		$courses=$specialization->courses->pluck('course','id');
		
        return response()->json($courses->toArray());
    }
	public function getCampuses($id)
    {
		$university=University::findOrFail($id);
		$campuses=$university->campuses->pluck('campus','id');
        return response()->json($campuses->toArray());
    }
	
		
	public function getUniversities($id)
    {
		$state=State::findOrFail($id);
		
		$universities=$state->universities->pluck('university','id');
		
         return response()->json($universities->toArray());
    }
		
	public function getSpecializations($id)
    {
		$campus=Campus::findOrFail($id);
		$specializations=$campus->specializations->pluck('campus','id');
         return response()->json($specializations->toArray());
    }

	public function comparison(Request $request)
    {		
	
		//$host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
		//p($host);
	
		$specializations=Specialization::whereIn('id',$request->comparisons)->get();
		//p($specializations);   
	 return view('specializations.comparison',compact(['specializations']));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
		$discipline_branch=DisciplineBranch::findOrFail($id);
				
		//p($request->course_id);			
			
		if($request->other_course!=''){
			try{
				
				$course=new Course();
				
				$course->course=$request->other_course;
				$course->code=AppHelper::acronym($request->other_course);	
				
				$course->discipline_id=$discipline_branch->discipline_id;
				$course->branch_id=$discipline_branch->branch_id;
				$course->specialization_id=$request->specialization_id;
				$course->save();
			
			} catch (\Exception $e) {
				$errorCode = $e->errorInfo[1];
				if($errorCode == 1062){
					return redirect(route('branch_specializations.index',$discipline_branch->id))->with(['error' => 'Record '.$request->other_course.' course already existed!!']);
				}
			}
			$specialization_course_id=$course->id;
			
		}else{
			$specialization_course_id=$request->course_id;	
		}
			//die('ssss');
				
        $branch_specialization = new BranchSpecialization();
		try{
			$branch_specialization->fill($request->all());
			$branch_specialization->discipline_branch_id=$discipline_branch->id;
			$branch_specialization->university_id=$discipline_branch->university_id;
			$branch_specialization->campus_id=$discipline_branch->campus_id;
			$branch_specialization->program_id=$discipline_branch->program_id;
			$branch_specialization->discipline_id=$discipline_branch->discipline_id;
			$branch_specialization->branch_id=$discipline_branch->branch_id;			
			$branch_specialization->attendance_id=$request->attendance_id;
			$branch_specialization->duration_id=$request->duration_id;
			$branch_specialization->specialization_id=$request->specialization_id;
			$branch_specialization->course_id=$specialization_course_id;
			
			$specializationfees=[];
			
			$annual_fees=$request->annual_fees;
			//var_dump($annual_fees);die();		
			
			if($this->is2DArrayEmpty($annual_fees)){
				return back()->with(['error'=>'Please enter fees with corresponding format selection!']);
			}
			
			$requirement_score = AppHelper::scoreFilters($request->requirement_score);
			$annual_fees = AppHelper::mfilters($request->annual_fees);
			
			if(!strcmp($request->scholorship,'Not Available')){
				$branch_specialization->scholorship_link=null;
			}else{				
				$branch_specialization->scholorship_link=$request->scholorship_link;
			}	
				
			$branch_specialization->save();
							
			$semisters=$request->sem;
	
			foreach($semisters as $key=>$value){
				
				if(!empty($semisters[$key]['semister'])){
					$semister=new SpcSemister();
					$semister->branch_specialization_id = $branch_specialization->id; 		
					$semister->semister = $semisters[$key]['semister'];        		
					$semister->app_start_date = $semisters[$key]['app_start_date']; 		
					$semister->app_end_date = $semisters[$key]['app_end_date']; 
					$semister->university_early_decision_date	= $semisters[$key]['university_early_decision_date']; 	
					$semister->university_regular_decision_date	= $semisters[$key]['university_regular_decision_date']; 	
					$semister->save();
				}
			}
		
			
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('branch_specializations.index',$branch_specialization->discipline_branch_id))->with(['error' => 'Record already existed!!']);
			}
		}
		
		//p($requirement_score);
		
			//$specialization->specialization_fees()->save($specializationfees);
			
		foreach($requirement_score as $key=>$value){
			$branch_specialization_requirement=new BranchSpecializationRequirement();
			$branch_specialization_requirement->requirement_id=$requirement_score[$key][0];
			$branch_specialization_requirement->score=$requirement_score[$key][1];
			$branch_specialization_requirement->duration_id=$branch_specialization->duration_id;
			$branch_specialization_requirement->attendance_id=$branch_specialization->attendance_id;
			$branch_specialization_requirement->branch_id=$branch_specialization->branch_id;
			$branch_specialization_requirement->discipline_id=$branch_specialization->discipline_id;
			$branch_specialization_requirement->program_id=$branch_specialization->program_id;
			$branch_specialization_requirement->campus_id=$branch_specialization->campus_id;
			$branch_specialization_requirement->university_id=$branch_specialization->university_id;
			$branch_specialization_requirement->branch_sp_id=$branch_specialization->id;
			$branch_specialization_requirement->specialization_id=$branch_specialization->specialization_id;
			$branch_specialization_requirement->course_id=$branch_specialization->course_id;
			$branch_specialization_requirement->branch_sp_id=$branch_specialization->id;
			$branch_specialization_requirement->save(); 
		}
		foreach($annual_fees as $key=>$value){
		
			//var_dump($this->is2DArrayEmpty($annual_fees[$key]));
			
			$branch_specialization_fee=new BranchSpecializationFee();
			$branch_specialization_fee->format_id=$annual_fees[$key][0];
			$branch_specialization_fee->fees=$annual_fees[$key][1];
			$branch_specialization_fee->branch_specialization_id=$branch_specialization->id;
			$branch_specialization_fee->course_id=$branch_specialization->course_id;
			$branch_specialization_fee->save(); 
			
		}
		return redirect(route('branch_specializations.index',$branch_specialization->discipline_branch_id))->with(['success'=>'Branch updated successfully']);

    }

		public function is2DArrayEmpty($array) {
			// Iterate through each row in the 2D array
			foreach ($array as $row) {
				// Check if any element in the row is not empty
				foreach ($row as $element) {
					if (!empty($element)) {
						return false; // The array is not empty
					}
				}
			}
			return true; // All elements are empty, so the array is considered empty
		}
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $branch_specialization=BranchSpecialization::findOrFail($id);
        return view('branch_specializations.show',compact(['branch_specialization']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $branch_specialization=BranchSpecialization::findOrFail($id);
        $specializations= $branch_specialization->discipline_branch->branch->specializations->pluck('specialization','id');
		
		//p($specializations);
		$branch=Branch::findOrFail($branch_specialization->branch_id);
		$courses=Course::where('specialization_id',$branch_specialization->specialization_id)->get()->pluck('course','id')->toArray();
        
			
		$semisters=$branch_specialization->getSemistersArray(AppHelper::options('Semisters'));
//	p($semisters);
		return view('branch_specializations.edit',compact(['specializations','branch_specialization','branch','courses','semisters']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $branch_specialization = BranchSpecialization::findOrFail($id);
		
		//p($request->all());
		
		try{
			$branch_specialization->fill($request->all());
			$branch_specialization->university_id=$branch_specialization->university_id;
			$branch_specialization->campus_id=$branch_specialization->campus_id;
			$branch_specialization->program_id=$branch_specialization->program_id;
			$branch_specialization->discipline_id=$branch_specialization->discipline_id;
			$branch_specialization->branch_id=$branch_specialization->branch_id;
			$branch_specialization->attendance_id=$request->attendance_id;
			$branch_specialization->duration_id=$request->duration_id;
			$branch_specialization->specialization_id=$request->specialization_id;
			$branch_specialization->course_id=$request->course_id;
			
			if(!strcmp($request->scholorship,'Not Available')){
				$branch_specialization->scholorship_link=null;
			}else{				
				$branch_specialization->scholorship_link=$request->scholorship_link;
			}
			
			$specializationfees=[];
			
			$annual_fees=$request->annual_fees;
			//var_dump($annual_fees);die();		
			
			if($this->is2DArrayEmpty($annual_fees)){
				return back()->with(['error'=>'Please enter fees with corresponding format selection!']);
			}
			
			$requirement_score = AppHelper::scoreFilters($request->requirement_score);
			$annual_fees = AppHelper::mfilters($request->annual_fees);
				
			$branch_specialization->save();
			
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('branch_specializations.index',$branch_specialization->discipline_branch_id))->with(['error' => 'Record already existed!!']);
			}
		}
		
		$semisters=$request->sem;		
		$branch_specialization->updateSemisters($semisters);
		
		//p($requirement_score);
		if(!empty($branch_specialization->branch_specialization_fees))
			$branch_specialization->branch_specialization_fees()->delete();
		
		if(!empty($branch_specialization->branch_specialization_requirements))
			$branch_specialization->branch_specialization_requirements()->delete();
			
		foreach($requirement_score as $key=>$value){
			$branch_specialization_requirement=new BranchSpecializationRequirement();
			$branch_specialization_requirement->requirement_id=$requirement_score[$key][0];
			$branch_specialization_requirement->score=$requirement_score[$key][1];
			$branch_specialization_requirement->duration_id=$branch_specialization->duration_id;
			$branch_specialization_requirement->attendance_id=$branch_specialization->attendance_id;
			$branch_specialization_requirement->branch_id=$branch_specialization->branch_id;
			$branch_specialization_requirement->discipline_id=$branch_specialization->discipline_id;
			$branch_specialization_requirement->program_id=$branch_specialization->program_id;
			$branch_specialization_requirement->campus_id=$branch_specialization->campus_id;
			$branch_specialization_requirement->university_id=$branch_specialization->university_id;
			$branch_specialization_requirement->specialization_id=$branch_specialization->specialization_id;
			$branch_specialization_requirement->course_id=$branch_specialization->course_id;
			$branch_specialization_requirement->branch_sp_id=$branch_specialization->id;
			$branch_specialization_requirement->save(); 
		}
		foreach($annual_fees as $key=>$value){
		
			//var_dump($this->is2DArrayEmpty($annual_fees[$key]));
			
			$branch_specialization_fee=new BranchSpecializationFee();
			$branch_specialization_fee->format_id=$annual_fees[$key][0];
			$branch_specialization_fee->fees=$annual_fees[$key][1];
			$branch_specialization_fee->branch_specialization_id=$branch_specialization->id;
			$branch_specialization_fee->course_id=$branch_specialization->course_id;
			$branch_specialization_fee->save(); 
			
		}
		return redirect(route('branch_specializations.index',$branch_specialization->discipline_branch_id))->with(['success'=>'Branch updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $branch_specialization=BranchSpecialization::findOrFail($id);
		if($branch_specialization->branch_specialization_fees->count()){
			return redirect(route('branch_specializations.index',$branch_specialization->discipline_branch_id))->with('error','Sorry not able to delete, it has many relations!');
		}
		$branch_specialization->delete();
		return redirect(route('branch_specializations.index',$branch_specialization->discipline_branch_id))->with(['success'=>'Branch updated successfully']);
    }
	
	 /**
     * Remove the specified resource from storage.
     */
    public function courseView($id)
    {
		//ep($id);
        $branch_specialization=BranchSpecialization::findOrFail($id);
		
		return view('branch_specializations.course-view',compact(['branch_specialization']))->with(['error'=>'after seeing the details please close the tab!']);
    }
	
	
}
