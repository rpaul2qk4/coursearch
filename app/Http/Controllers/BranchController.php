<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Discipline;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
		$discipline=Discipline::findOrFail($id);
        return view('branches.index',compact(['discipline']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
		$discipline=Discipline::findOrFail($id);
        return view('branches.create',compact(['discipline']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBranchRequest $request,$id)
    {
		try{
			$discipline=Discipline::findOrFail($id);
			$branch = new Branch();		
			$branch->branch=$request->branch;
			$branch->code=$request->code;		
			$branch->description=$request->description;
			$branch->discipline_id=$discipline->id;		
			$branch->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('branches.index',$branch->discipline->id))->with(['error' => 'Record already existed!!']);
			}
		}
		//var_dump($branch->discipline);die();
		return redirect(route('branches.index',$branch->discipline->id))->with(['success'=>'Discipline updated successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $branch=Branch::findOrFail($id);
        return view('branches.show',compact(['branch']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $branch=Branch::findOrFail($id);
        return view('branches.edit',compact(['branch']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchRequest $request, $id)
    {
        try{
			$branch = Branch::findOrFail($id);						
			$branch->branch=$request->branch;
			$branch->code=$request->code;
			$branch->description=$request->description;
			$branch->save();		
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('branches.index',$branch->discipline->id))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('branches.index',$branch->discipline->id))->with(['success'=>'Discipline updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $branch=Branch::findOrFail($id);
		if($branch->branch_specializations->count()){
				return redirect(route('branches.index',$branch->discipline->id))->with('error','Sorry not able to delete, it has many relations!');
		}
		$branch->delete();
		return redirect(route('branches.index',$branch->discipline->id))->with(['success'=>'Discipline updated successfully']);
    }
}
