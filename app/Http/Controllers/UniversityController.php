<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Semister;
use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$universities=University::orderBy('university', 'asc')->paginate(50);
        return view('universities.index',compact(['universities']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		 $countries=Country::get()->pluck('country','id')->prepend("Select","");	
         return view('universities.create',compact(['countries']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUniversityRequest $request)
    {
        $university = new University();
		$university->fill($request->all());	
		
		$university->save();
	
		$semisters=$request->sem;
	
		foreach($semisters as $key=>$value){
			
			if(!empty($semisters[$key]['semister'])){
				$semister=new Semister();
				$semister->university_id = $university->id; 		
				$semister->semister = $semisters[$key]['semister'];        		
				$semister->app_start_date = $semisters[$key]['app_start_date']; 		
				$semister->app_end_date = $semisters[$key]['app_end_date']; 
				$semister->university_early_decision_date	= $semisters[$key]['university_early_decision_date']; 	
				$semister->university_regular_decision_date	= $semisters[$key]['university_regular_decision_date']; 	
				$semister->save();
			}
		}
		return redirect(route('universities.index'))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
  		$university=University::findOrFail($id); 
		$sem=$university->semisters->toArray();
		
		$semisters=[];		
		
		foreach(AppHelper::options('Semisters') as $key1=>$value1){
			$semisters[$key1]=[];
			foreach($sem as $key2=>$value2){
				//var_dump($value2['semister']);die();
				if(!strcmp($value1,$value2['semister'])){
					$semisters[$key1]=$value2;
				}
			}
		}
		
        return view('universities.show',compact(['university','semisters']));
   }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
		$university=University::findOrFail($id); 
        $countries=Country::get()->pluck('country','id')->prepend("Select","");	
        $states=State::where('country_id',$university->country_id)->get()->pluck('state','id')->prepend("Select","");	
        $cities=City::get()->pluck('city','id')->prepend("Select","");	
			
		$semisters=$university->getSemistersArray(AppHelper::options('Semisters'));
		//p($semisters);
        return view('universities.edit',compact(['university','countries','states','cities','semisters']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUniversityRequest $request,$id)
    {		
	//p($request->all());
	    $university = University::findOrFail($id);
		$university->fill($request->all());
		$university->save();
	
		$semisters=$request->sem;		
		$university->updateSemisters($semisters);
				
		return redirect(route('universities.index'))->with(['success' => '1 Record inserted successfully!']);
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $university=University::findOrFail($id); 
		if($university->campuses->count()){
			return redirect(route('universities.index'))->with('error','Sorry not able to delete, it has many relations!');
		}
		$university->delete();
		return redirect(route('universities.index'))->with(['success' => '1 Record inserted successfully!']);
    }
	
	public function getState($id)
    {		
		$country=Country::findOrFail($id);
		$states=$country->states()->pluck('state','id');                             
        return response()->json($states->toArray());
    }
   
	public function getCity(State $state)
    {
		$cities=$state->cities->pluck('city','id');   
        return response()->json($cities->toArray());
    }
}
