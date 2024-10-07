<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\University;
use App\Helpers\AppHelper;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


	public function search(SearchRequest $request)
    {		
		$query = University::query();
		
		$filters = AppHelper::filters($request->all());
		
		$hasFilters = !empty($filters);		


		if(empty($filters['location']) && empty($filters['specialization'])){
		
				$universities = University::all(); 
								
				//p($universities);
		        return view('search-results.search-list',compact(['universities']));
 		}

		if(!empty($filters['location']) && empty($filters['specialization'])){
			$query->when(isset($filters['location']), function($q) use ($filters) {
				$q->orWhereHas('country', function($q) use ($filters){
					$q->where('country', 'like', "%{$filters['location']}%");
				});			
			}); 
			
			$query->when(isset($filters['location']), function($q) use ($filters) {
				$q->orWhereHas('state', function($q) use ($filters){
					$q->where('state', 'like', "%{$filters['location']}%");
				});
			}); 
			
			$query->when(isset($filters['location']), function($q) use ($filters) {
				$q->orWhereHas('city', function($q) use ($filters){
					$q->where('city', 'like', "%{$filters['location']}%");
				});
			}); 
		
			$query->when(isset($filters['location']), function($q) use ($filters) {
				$q->orWhereHas('city', function($q) use ($filters){
					$q->where('city', 'like', "%{$filters['location']}%");
				});
			}); 
		
		}
		
		if(empty($filters['location']) && !empty($filters['specialization'])){
		
			$query->when(isset($filters['specialization']), function($q) use ($filters) {
				$q->whereHas('specializations', function($q) use ($filters){
					$q->where('specialization', 'like', "%{$filters['specialization']}%");
				});
			}); 
		}
		
		if(!empty($filters['location']) && !empty($filters['specialization'])){
		
				$universities = University::with(['country', 'state', 'city'])
								->whereHas('specializations', function($q) use ($filters) {
							 		$q->where('specialization', 'like', "%{$filters['specialization']}%");
								})
								->when(isset($filters['location']), function($q) use ($filters) {
									$q->whereHas('country', function($q) use ($filters){
										$q->where('country', 'like', "%{$filters['location']}%");
									});
								})
								->when(isset($filters['location']), function($q) use ($filters) {
									$q->orWhereHas('state', function($q) use ($filters){
										$q->where('state', 'like', "%{$filters['location']}%");
									});
								})->get(); 
								
				//p($universities);
		        return view('search-results.search-list',compact(['universities']));
 
		}		
				$universities=$query->get(); 
		
		/* foreach($universities as $university){
			p($university->specializations);
		} */
        return view('search-results.search-list',compact(['universities']));
    }
	
	public function searchList()
    {
		$courses=Specialization::all();
		$dis=null;
        return view('search-results.search-list',compact(['courses','dis']));
    }
	
	public function comparison(Request $request)
    {		
	
		//$host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
		//p($host);
	
		$specializations=Specialization::whereIn('id',$request->comparisons)->get();
		//p($specializations);   
	 return view('search-results.comparison',compact(['specializations']));
    }
	
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
