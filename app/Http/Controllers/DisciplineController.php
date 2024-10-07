<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Advertisement;
use App\Models\Discipline;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDisciplineRequest;
use App\Http\Requests\UpdateDisciplineRequest;

class DisciplineController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {       
		$disciplines=Discipline::all();
		return view('disciplines.index', compact(['disciplines'])); 
    }

	public function disciplineList()
    {
        return view('disciplines.discipline-list');
    }
	
	public function allDisciplineList()
    {
		$disciplines=Discipline::all();
		//p($disciplines);
		$advertisements=Advertisement::all();
        return view('disciplines.all-discipline-list',compact(['disciplines','advertisements']));
    }
	
	public function disciplineDetails()
    {
        return view('disciplines.discipline-details');
    }
	
    /**
     * Show the form for creating a new resource.
     */
    public function create(Program $program)
    {
		return view('disciplines.create', compact(['program']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDisciplineRequest $request)
    {
        $discipline = new Discipline();
		try{
			$discipline->discipline=$request->discipline;
			$discipline->code=$request->code;
			$discipline->icon=$request->icon;
			$discipline->description=$request->description;
			if ($request->file('disp_image')) {
				
				$fileType = $_FILES['disp_image']['type'];
		
				$fileActualExt = explode('/',$fileType);
				$allowed = array('jpeg','jpg','png');

				if(!in_array($fileActualExt[1],$allowed)){
					return redirect()->back()->with('error','Please upload image jpg/jpeg/png types only!'); 
				} 
				
				$discipline->disp_image = $request->file('disp_image')->store('discipline_photos','public');		
			} 
			$discipline->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('disciplines.index'))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('disciplines.index'))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $discipline = Discipline::findOrFail($id);
		return view('disciplines.show', compact(['discipline']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $discipline = Discipline::findOrFail($id);
		return view('disciplines.edit', compact(['discipline']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDisciplineRequest $request, $id)
    {
		//p($request->all());
        $discipline = Discipline::findOrFail($id);
		try{
			$discipline->discipline=$request->discipline;
			$discipline->code=$request->code;
			$discipline->icon=$request->icon;
			$discipline->description=$request->description;
			if ($request->file('disp_image')) {
				
				$fileType = $_FILES['disp_image']['type'];
		
				$fileActualExt = explode('/',$fileType);
				$allowed = array('jpeg','jpg','png');

				if(!in_array($fileActualExt[1],$allowed)){
					return redirect()->back()->with('error','Please upload image jpg/jpeg/png types only!'); 
				} 
				
				$discipline->disp_image = $request->file('disp_image')->store('discipline_photos','public');		
			} 
			$discipline->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('disciplines.index'))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('disciplines.index'))->with(['success'=>'Discipline updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $discipline=Discipline::findOrFail($id);
		if($discipline->program_disciplines->count()){
				return redirect(route('disciplines.index'))->with('error','Sorry not able to delete, it has many relations!');
		}
		$discipline->delete();
		return redirect(route('disciplines.index'))->with('success','1 Record deleted successfully!');
    }
}
