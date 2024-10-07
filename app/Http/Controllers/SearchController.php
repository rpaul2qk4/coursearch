<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\BranchSpecialization;
use App\Models\University;
use App\Models\Campus;
use App\Models\Course;
use App\Models\Country;
use App\Models\State;
use App\Models\Discipline;
use App\Helpers\AppHelper;

class SearchController extends Controller
{
  
	public function search(SearchRequest $request)
    {		
		$query = BranchSpecialization::query();
		
		$filters = AppHelper::filters($request->all());
				
		//p($request->all());
		$states=[''=>''];
		$state_universities=[''=>''];
		$campuses=[''=>''];
		$disciplines=Discipline::all();
		
		$hasFilters = !empty($filters);		


		if(empty($filters['location']) && empty($filters['specialization'])){
		
			$universities = [];// BranchSpecialization::all(); 
							
			$total_specializations=0;//$universities->count();				
			//p($universities);
			
			//return redirect(route('search-results.search'))->with(['error'=>'You must have to select discipline!!']);

			return view('search-results.search-list',compact(['disciplines','filters','states','campuses','state_universities','universities','total_specializations']))->with(['error'=>'Please search something!'])->with(['error'=>'You must have to select discipline!!']);
 		}

		if(!empty($filters['location']) && empty($filters['specialization'])){
			
			$query->whereHas("university", function($q1) use ($filters) {
					$q1->when(isset($filters['location']), function($q) use ($filters) {
						$q->whereHas('country', function($q) use ($filters){
							$q->where('country', 'like', '%'.$filters['location'].'%');
						});			
					}); 
					
					$q1->when(isset($filters['location']), function($q) use ($filters) {
						$q->orWhereHas('state', function($q) use ($filters){
							$q->where('state', 'like', '%'.$filters['location'].'%');
						});
					});
			})
			
			->get();				
			
			$universities=$query->orderByRaw('apply_deadline DESC')->where('course_id','<>',null) ->get(); 
			$total_specializations=$universities->count();	
			return view('search-results.search-list',compact(['disciplines','filters','states','campuses','state_universities','universities','total_specializations']));

		}
	
		
		if(empty($filters['location']) && !empty($filters['specialization'])){
			
			$query->when(isset($filters['specialization']), function($q) use ($filters) {
				
				$q->whereHas('specialization', function($q) use ($filters){
					$q->where('specialization', 'like', '%'.$filters['specialization'].'%');
				});
				$q->orWhereHas('course', function($q) use ($filters){
					$q->where('course', 'like', '%'.$filters['specialization'].'%');
				});
								
			}); 
			
			$universities=$query->orderByRaw('apply_deadline DESC')->where('course_id','<>',null) ->get(); 
			$total_specializations=$universities->count();
			return view('search-results.search-list',compact(['disciplines','filters','states','campuses','state_universities','universities','total_specializations']));
		}
		
		
		if(!empty($filters['location']) && !empty($filters['specialization'])){
		
			$query->whereHas("university", function($q1) use ($filters) {
				$q1->whereHas('country', function($q2) use ($filters) {
					$q2->where('country', 'like', "%{$filters['location']}%");
				});
				
			})
			->WhereHas('specialization', function($q) use ($filters){
				$q->where('specialization', 'like', '%'.$filters['specialization'].'%');
			})->get();				
							
			//p($universities);
			$universities=$query->orderByRaw('apply_deadline DESC')->where('course_id','<>',null) ->get(); 
			$total_specializations=$universities->count();
			return view('search-results.search-list',compact(['disciplines','filters','states','campuses','state_universities','universities','total_specializations']));
 
		}		
				
		$universities=$query->orderByRaw('apply_deadline DESC')->where('course_id','<>',null) ->get(); 
		$total_specializations=$universities->count();
        return view('search-results.search-list',compact(['disciplines','filters','states','campuses','state_universities','universities','total_specializations']));
    }
	
	public function modalSearch(SearchRequest $request)
    {		
		$query = BranchSpecialization::query();
		
		$filters = AppHelper::filters($request->all());
			
			$hasFilters = !empty($filters);
			
			//p(count($filters));

			$query->whereHas("campus", function($oq) use ($filters) {
				$oq->when(isset($filters['country_id']), function($q) use ($filters) {
					$q->where('country_id', $filters['country_id']);
				});
				
				$oq->when(isset($filters['state_id']), function($q) use ($filters) {
					$q->where('state_id', $filters['state_id']);
				});	
				$oq->when(isset($filters['university_id']), function($q) use ($filters) {
					$q->where('university_id', $filters['university_id']);
				});

				$oq->when(isset($filters['campus_id']), function($q) use ($filters) {
					$q->where('id', $filters['campus_id']);
				});	
			});
				
			$query->whereHas("specialization", function($oq) use ($filters) {		

				$oq->when(isset($filters['specialization']), function($q) use ($filters) {
					$q->where('specialization', 'like', '%'.$filters['specialization'].'%');
				});	
			});			
				
			if(!empty($filters['country_id'])){	
				$country=Country::findOrFail($filters['country_id']);
				
				$states=$country->states->pluck('state','id')->prepend('Select','')->toArray();	
				//p($states);
			}else{
				$states=[''=>''];
			}		
			
			if(!empty($filters['state_id'])){	
				$state=State::findOrFail($filters['state_id']);
				$state_universities=$state->universities->pluck('university','id')->prepend('Select','')->toArray();			
			}else{
				$state_universities=[''=>''];
			}
			
			if(!empty($filters['university_id'])){	
				$university=University::findOrFail($filters['university_id']);
				$campuses=$university->campuses->pluck('campus','id')->prepend('Select','')->toArray();	
			}else{
				$campuses=[''=>''];
			}
			
			$universities=$query->orderByRaw('apply_deadline DESC')->where('course_id','<>',null)->get(); 
			
			if(count($filters)<2){
				$universities=(object)[];
				$total_specializations=0;
			}else{
				$total_specializations=$universities->count();
			}
		$disciplines=Discipline::all();
        return view('search-results.search-list',compact(['campuses','states','disciplines','filters','state_universities','universities','total_specializations']));
    }
	
	
	public function searchList()
    {		
		$courses=Specialization::all();
		$dis=null;
        $total_specializations=$universities->count();
		return view('search-results.search-list',compact(['courses','dis','total_specializations']));
    }
	
	public function comparison(Request $request)
    {		
	
		//$host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
		//p($host);
	
		$specializations=BranchSpecialization::whereIn('id',$request->comparisons)->get();
		
		return view('search-results.comparison',compact(['specializations']));
    }
	
   
}
