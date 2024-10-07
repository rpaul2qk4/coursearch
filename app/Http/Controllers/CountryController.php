<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::orderBy('country', 'asc')->paginate(50);
		return view('countries.index', compact(['countries'])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
		try{
			$country = new Country;
			$country->fill($request->all());
			$country->save();
		} catch (\Exception $e) {
				$errorCode = $e->errorInfo[1];
				if($errorCode == 1062){
					return redirect(route('countries.index'))->with(['error' => 'Record is already exists!!']);
				}
		}
		return redirect(route('countries.index'))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $country = Country::findOrFail($id);
		return view('countries.show', compact(['country']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);
		return view('countries.edit', compact(['country']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, $id)
    {
        $country = Country::findOrFail($id);		
		try{			
			$country->fill($request->all());
			$country->save();
		} catch (\Exception $e) {
				$errorCode = $e->errorInfo[1];
				if($errorCode == 1062){
					return redirect(route('countries.index'))->with(['error' => 'Record is already exists!!']);
				}
		}
		return redirect(route('countries.index'))->with(['success'=>'Country updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Country::findOrFail($id)->delete();
		 Country::findOrFail($id)->forceDelete();
		return redirect(route('countries.index'))->with('success','1 Record deleted successfully!');
    }
}
