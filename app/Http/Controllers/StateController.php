<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
		$country=Country::findOrFail($id);
        return view('states.index',compact(['country']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
		$country=Country::findOrFail($id);
        return view('states.create',compact(['country']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request,$id)
    {
        try{
			$state = new State();		
			$state->fill($request->all());
			$state->country_id=$id;
			$state->save();
		} catch (\Exception $e) {
				$errorCode = $e->errorInfo[1];
				if($errorCode == 1062){
					return redirect(route('states.index',$state->country->id))->with(['error' => 'Record is already exists!!']);
				}
		}
		return redirect(route('states.index',$state->country->id))->with(['success'=>'Country updated successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $state=State::findOrFail($id);
        return view('states.show',compact(['state']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $state=State::findOrFail($id);
        return view('states.edit',compact(['state']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, $id)
    {
        $state = State::findOrFail($id);		
		try{			
			$state->fill($request->all());
			$state->save();
		} catch (\Exception $e) {
				$errorCode = $e->errorInfo[1];
				if($errorCode == 1062){
					return redirect(route('states.index',$state->country->id))->with(['error' => 'Record is already exists!!']);
				}
		}
		return redirect(route('states.index',$state->country->id))->with(['success'=>'Country updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $state=State::findOrFail($id);
		$state->forceDelete();
		return redirect(route('states.index',$state->country->id))->with(['success'=>'Country updated successfully']);

    }
}
