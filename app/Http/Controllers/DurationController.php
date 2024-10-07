<?php

namespace App\Http\Controllers;

use App\Models\Duration;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDurationRequest;
use App\Http\Requests\UpdateDurationRequest;

class DurationController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $durations = Duration::all();
		return view('durations.index', compact(['durations'])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('durations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDurationRequest $request)
    {
		try{
			$duration = new Duration;
			$duration->fill($request->all());
			$duration->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('durations.index'))->with(['error' => 'Given record already inserted!!']);
			}
		}
		return redirect(route('durations.index'))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $duration = Duration::findOrFail($id);
		return view('durations.show', compact(['duration']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $duration = Duration::findOrFail($id);
		return view('durations.edit', compact(['duration']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDurationRequest $request, $id)
    {
        $duration = Duration::findOrFail($id);		
		try{			
			$duration->fill($request->all());
			$duration->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('durations.index'))->with(['error' => 'Given record already inserted!!']);
			}
		}
		return redirect(route('durations.index'))->with(['success'=>'Duration updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
		$duration = Duration::findOrFail($id);
			if($duration->branch_specializations->count()){
				return redirect(route('durations.index'))->with('error','Sorry not able to delete, it has many relations!');
			}
		$duration->delete();
		return redirect(route('durations.index'))->with('success','1 Record deleted successfully!');
    }
}
