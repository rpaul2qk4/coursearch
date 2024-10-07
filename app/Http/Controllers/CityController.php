<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
		$state=State::findOrFail($id);
        return view('cities.index',compact(['state']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
		$state=State::findOrFail($id);
        return view('cities.create',compact(['state']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request,$id)
    {
		try{
			$state=State::findOrFail($id);
				$city = new City();		
				$city->fill($request->all());
				$city->country_id=$state->country->id;
				$city->state_id=$state->id;
				$city->save();
		} catch (\Exception $e) {
				$errorCode = $e->errorInfo[1];
				if($errorCode == 1062){
					return redirect(route('cities.index',$city->state->id))->with(['error' => 'Given record already inserted!!']);
				}
		}
		return redirect(route('cities.index',$city->state->id))->with(['success'=>'1 Record inserted successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $city=City::findOrFail($id);
        return view('cities.show',compact(['city']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $city=City::findOrFail($id);
        return view('cities.edit',compact(['city']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, $id)
    {
		try{
			$city = City::findOrFail($id);		
						
			$city->fill($request->all());
			$city->save();
		} catch (\Exception $e) {
				$errorCode = $e->errorInfo[1];
				if($errorCode == 1062){
					return redirect(route('cities.index',$city->state->id))->with(['error' => 'Record is already exists!!']);
				}
		}
		return redirect(route('cities.index',$city->state->id))->with(['success'=>'Record updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $city=City::findOrFail($id);
		$city->delete();
		return redirect(route('cities.index',$city->state->id))->with(['success'=>'Record deleted successfully']);

    }
}
