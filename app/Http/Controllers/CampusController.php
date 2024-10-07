<?php

namespace App\Http\Controllers;


use App\Models\University;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Campus;
use Illuminate\Http\Request;

use App\Http\Requests\StoreCampusRequest;
use App\Http\Requests\UpdateCampusRequest;

class CampusController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
		$university=University::findOrFail($id);
	     return view('campuses.index',compact(['university']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
		$university=University::findOrFail($id);
		$countries=Country::get()->pluck('country','id')->prepend("Select","");	
        return view('campuses.create',compact(['countries','university']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCampusRequest $request,$id)
    {
		try{
				$university=University::findOrFail($id);
				$campus = new Campus();
				$campus->fill($request->all());
				$campus->university_id=$university->id;
				$campus->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('campuses.index',$university->id))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('campuses.index',$university->id))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
  		$campus=Campus::findOrFail($id); 
        return view('campuses.show',compact(['campus']));
   }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
		$campus=Campus::findOrFail($id); 
        $countries=Country::get()->pluck('country','id')->prepend("Select","");	
        $states=State::where('country_id',$campus->country_id)->get()->pluck('state','id')->prepend("Select","");	
        $cities=City::get()->pluck('city','id')->prepend("Select","");	
        return view('campuses.edit',compact(['campus','countries','states','cities']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCampusRequest $request,$id)
    {
        $campus = Campus::findOrFail($id);
		try{
			$campus->fill($request->all());
			$campus->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('campuses.index',$university->id))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('campuses.index',$campus->university_id))->with(['success' => '1 Record inserted successfully!']);
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $campus=Campus::findOrFail($id); 
		if($campus->campus_programs->count()){
			return redirect(route('campuses.index',$campus->university_id))->with('error','Sorry not able to delete, it has many relations!');
		}
		$campus->delete();
		return redirect(route('campuses.index',$campus->university_id))->with(['success' => '1 Record inserted successfully!']);
    }
	
	public function getState(Country $country)
    {		      
		$states=$country->states->pluck('state','id');                             
        return response()->json($states->toArray());
    }
   
	public function getCity(State $state)
    {
		$cities=$state->cities->pluck('city','id');   
        return response()->json($cities->toArray());
    }
}
