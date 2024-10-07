<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Discipline;
use App\Models\ProgramDiscipline;
use App\Models\DisciplineBranch;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;

class DisciplineBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
		
		$program_discipline=ProgramDiscipline::findOrFail($id);
		//p($program_discipline->discipline_branches);
        return view('discipline_branches.index',compact(['program_discipline']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
		$program_discipline=ProgramDiscipline::findOrFail($id);
        return view('discipline_branches.create',compact(['program_discipline']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
		$program_discipline=ProgramDiscipline::findOrFail($id);
        $discipline_branch = new DisciplineBranch();	
		try{
			$discipline_branch->branch_id=$request->branch_id;
			$discipline_branch->program_discipline_id=$program_discipline->id;
			$discipline_branch->discipline_id=$program_discipline->discipline_id;
			$discipline_branch->university_id=$program_discipline->university_id;
			$discipline_branch->campus_id=$program_discipline->campus_id;
			$discipline_branch->program_id=$program_discipline->program_id;
			$discipline_branch->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('discipline_branches.index',$program_discipline->id))->with(['error' => 'Record already existed!!']);
			}
		}
		//var_dump($branch->discipline);die();
		return redirect(route('discipline_branches.index',$program_discipline->id))->with(['success'=>'Discipline updated successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $discipline_branch=DisciplineBranch::findOrFail($id);
        return view('discipline_branches.show',compact(['discipline_branch']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $discipline_branch=DisciplineBranch::findOrFail($id);
		$program_discipline=ProgramDiscipline::findOrFail( $discipline_branch->program_discipline_id);
        return view('discipline_branches.edit',compact(['discipline_branch','program_discipline']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $discipline_branch = DisciplineBranch::findOrFail($id);
		try{
			$discipline_branch->branch_id=$request->branch_id;
			
			$discipline_branch->save();		
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('discipline_branches.index',$discipline_branch->program_discipline_id))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('discipline_branches.index',$discipline_branch->program_discipline_id))->with(['success'=>'Discipline updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $branch=Branch::findOrFail($id);
		$branch->delete();
		return redirect(route('discipline_branches.index',$branch->discipline->id))->with(['success'=>'Discipline updated successfully']);
    }
}
