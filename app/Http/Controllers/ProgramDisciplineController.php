<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Discipline;
use App\Models\CampusProgram;
use App\Models\ProgramDiscipline;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDisciplineRequest;
use App\Http\Requests\UpdateDisciplineRequest;

class ProgramDisciplineController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index($id)
    {       
	
		$campus_program=CampusProgram::findOrFail($id);
	
		return view('program_disciplines.index', compact(['campus_program'])); 
    }

	public function disciplineList()
    {
        return view('disciplines.discipline-list');
    }
	
	public function allDisciplineList()
    {
		$disciplines=Discipline::all();
		//p($disciplines);
        return view('disciplines.all-discipline-list',compact(['disciplines']));
    }
	
	public function disciplineDetails()
    {
        return view('disciplines.discipline-details');
    }
	
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
		$campus_program=CampusProgram::findOrFail($id);
		return view('program_disciplines.create', compact(['campus_program']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
		$campus_program=CampusProgram::findOrFail($id);
        $program_discipline = new ProgramDiscipline();
		try{
			$program_discipline->discipline_id=$request->discipline_id;
			$program_discipline->university_id=$campus_program->university_id;
			$program_discipline->campus_id=$campus_program->campus_id;
			$program_discipline->program_id=$campus_program->program_id;
			$program_discipline->campus_program_id=$campus_program->id;
			$program_discipline->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('program_disciplines.index',$campus_program->id))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('program_disciplines.index',$campus_program->id))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $program_discipline = ProgramDiscipline::findOrFail($id);
		return view('program_disciplines.show', compact(['program_discipline']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $program_discipline = ProgramDiscipline::findOrFail($id);
		return view('program_disciplines.edit', compact(['program_discipline']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		
        $program_discipline = ProgramDiscipline::findOrFail($id);
		//p($program_discipline);
		try{
			$program_discipline->discipline_id=$request->discipline_id;
			$program_discipline->university_id=$program_discipline->university_id;
			$program_discipline->campus_id=$program_discipline->campus_id;
			$program_discipline->program_id=$program_discipline->program_id;
			$program_discipline->campus_program_id=$program_discipline->campus_program_id;
			$program_discipline->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('program_disciplines.index',$program_discipline->campus_program_id))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('program_disciplines.index',$program_discipline->campus_program_id))->with(['success'=>'Discipline updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program_discipline=ProgramDiscipline::findOrFail($id);
		if($program_discipline->discipline_branches->count()){
			return redirect(route('program_disciplines.index',$program_discipline->campus_program_id))->with('error','Sorry not able to delete, it has many relations!');
		}
		$program_discipline->delete();
		return redirect(route('program_disciplines.index',$program_discipline->campus_program_id))->with('success','1 Record deleted successfully!');
    }
}
