<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequirementRequest;
use App\Http\Requests\UpdateRequirementRequest;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$requirements=Requirement::all();
		return view('requirements.index', compact(['requirements'])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('requirements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequirementRequest $request)
    {
		try{
			$requirement = new Requirement();
			$requirement->requirement=$request->requirement;
			$requirement->code=$request->code;
			$requirement->description=$request->description;
			$requirement->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('requirements.index'))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('requirements.index'))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $requirement = Requirement::findOrFail($id);
		return view('requirements.show', compact(['requirement']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $requirement = Requirement::findOrFail($id);
		return view('requirements.edit', compact(['requirement']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequirementRequest $request, $id)
    {
		try{
			$requirement = Requirement::findOrFail($id);					
			$requirement->requirement=$request->requirement;
			$requirement->code=$request->code;
			$requirement->description=$request->description;
			$requirement->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('requirements.index'))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('requirements.index'))->with(['success'=>'Requirement updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $requirement=Requirement::findOrFail($id);
		if($requirement->branch_specialization_requirements->count()){
			return redirect(route('requirements.index'))->with('error','Sorry not able to delete, it has many relations!');
		}
		$requirement->delete();
		return redirect(route('requirements.index'))->with('success','1 Record deleted successfully!');
    }
}
