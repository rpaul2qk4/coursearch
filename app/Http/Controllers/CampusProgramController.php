<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campus;
use App\Models\CampusProgram;

class CampusProgramController extends Controller
{
    public function index($id)
    {
		$campus=Campus::findOrFail($id);
		return view('campus_programs.index', compact(['campus'])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
		$campus=Campus::findOrFail($id);
		return view('campus_programs.create', compact(['campus']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
		$campus=Campus::findOrFail($id);
        $campus_program = new CampusProgram();
		try{
			$campus_program->program_id=$request->program_id;
			$campus_program->university_id=$campus->university_id;
			$campus_program->campus_id=$campus->id;
			$campus_program->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('campus_programs.index',$campus->id))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('campus_programs.index',$campus->id))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $campus_program = CampusProgram::findOrFail($id);
		return view('campus_programs.show', compact(['campus_program']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $campus_program = CampusProgram::findOrFail($id);
		return view('campus_programs.edit', compact(['campus_program']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campus_program = CampusProgram::findOrFail($id);					
		try{
			$campus_program->program_id=$request->program_id;
			$campus_program->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('campus_programs.index',$campus_program->campus_id))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('campus_programs.index',$campus_program->campus_id))->with(['success'=>'Program updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $campus_program = CampusProgram::findOrFail($id);
		$campus_id=$campus_program->campus_id;
		if($campus_program->program_disciplines->count()){
			return redirect(route('campus_programs.index',$campus_id))->with('error','Sorry not able to delete, it has many relations!');
		}
		$campus_program->delete();
		return redirect(route('campus_programs.index',$campus_id))->with('success','1 Record deleted successfully!');
    }
}
