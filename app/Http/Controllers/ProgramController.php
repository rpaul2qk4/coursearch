<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\University;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;

class ProgramController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$programs=Program::all();
		return view('programs.index', compact(['programs'])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
			try{
				$program = new Program();
				$program->program=$request->program;
				$program->code=$request->code;
				$program->description=$request->description;
				$program->save();
			} catch (\Exception $e) {
				 $errorCode = $e->errorInfo[1];
					if($errorCode == 1062){
						return redirect(route('programs.index'))->with(['error' => 'Given record already inserted!!']);
					}
			}
			
		return redirect(route('programs.index'))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);
		return view('programs.show', compact(['program']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
		return view('programs.edit', compact(['program']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request, $id)
    {
        try{
			$program = Program::findOrFail($id);					
			$program->program=$request->program;
			$program->code=$request->code;
			$program->description=$request->description;
			$program->save();
			} catch (\Exception $e) {
				 $errorCode = $e->errorInfo[1];
					if($errorCode == 1062){
						return redirect(route('programs.index'))->with(['error' => 'Given record already inserted!!']);
					}
			}
		return redirect(route('programs.index'))->with(['success'=>'Program updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program=Program::findOrFail($id);
		if($program->campus_programs->count()){
			return redirect(route('programs.index'))->with('error','Sorry not able to delete, it has many relations!');
		}
		$program->delete();
		return redirect(route('programs.index'))->with('success','1 Record deleted successfully!');
    }
}
