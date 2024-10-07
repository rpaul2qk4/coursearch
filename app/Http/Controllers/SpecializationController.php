<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Discipline;
use App\Models\Specialization;
use App\Models\BranchSpecialization;
use App\Models\SpecializationRequirement;
use App\Models\SpecializationFee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecializationRequest;
use App\Http\Requests\UpdateSpecializationRequest;
use Illuminate\Http\Request;
use App\Helpers\AppHelper;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
		$discipline=Discipline::findOrFail($id);
        return view('specializations.index',compact(['discipline']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
		$discipline=Discipline::findOrFail($id);
        return view('specializations.create',compact(['discipline']));
    }

	public function comparisonReport(Request $request)
    {		
	
		//$host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
		
		if(!empty($request->reports)){ 	
			$specializations=BranchSpecialization::whereIn('id',$request->reports)->get();
		}else{
			$specializations=(Object)[];
		}
		 // p(!is_null($specializations));
		return view('specializations.comparison-report',compact(['specializations']));
    }
	
	public function comparison(Request $request)
    {		
	
		//$host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
		//p($host);
	
		$specializations=BranchSpecialization::whereIn('id',$request->comparisons)->get();
		//p($specializations);   
		return view('specializations.comparison',compact(['specializations']));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
		$discipline=Discipline::findOrFail($id);
		
		try{
			
			$specialization = new Specialization();		
			$specialization->fill($request->all());
			
				if ($request->file('sp_pdf')) {
					
					$fileType = $_FILES['sp_pdf']['type'];
			
					$fileActualExt = explode('/',$fileType);
					$allowed = array('pdf');

					if(!in_array($fileActualExt[1],$allowed)){
						return redirect()->back()->with('error','Please upload file pdf type only!'); 
					} 
					
					$specialization->sp_pdf = $request->file('sp_pdf')->store('specialization_pdfs','public');		
				} 
			
			$specialization->discipline_id=$discipline->id;
			$specialization->save();
			
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('specializations.index',$specialization->discipline_id))->with(['error' => 'Record already existed!!']);
			}
		}
		
		return redirect(route('specializations.index',$specialization->discipline_id))->with(['success'=>'Branch updated successfully']);

    }
	
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $specialization=Specialization::findOrFail($id);
        return view('specializations.show',compact(['specialization']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $specialization=Specialization::findOrFail($id);
		$discipline=Discipline::findOrFail($specialization->discipline_id);
        return view('specializations.edit',compact(['specialization','discipline']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $specialization = Specialization::findOrFail($id);
		try{
			
			$discipline=Discipline::findOrFail($specialization->discipline_id);		
			$specialization->fill($request->all());
			
				if ($request->file('sp_pdf')) {
					
					$fileType = $_FILES['sp_pdf']['type'];
			
					$fileActualExt = explode('/',$fileType);
					$allowed = array('pdf');
					if(!in_array($fileActualExt[1],$allowed)){
						return redirect()->back()->with('error','Please upload the file pdf type only!'); 
					} 
					
					$specialization->sp_pdf = $request->file('sp_pdf')->store('specialization_pdfs','public');		
				} 
			
			$specialization->discipline_id=$discipline->id;
			
			$specialization->save();
			
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('specializations.index',$specialization->discipline_id))->with(['error' => 'Record already existed!!']);
			}
		}
		
		return redirect(route('specializations.index',$specialization->discipline_id))->with(['success'=>'Branch updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $specialization=Specialization::findOrFail($id);
		if($specialization->courses->count()){
			return redirect(route('specializations.index',$specialization->discipline_id))->with('error','Sorry not able to delete, it has many relations!');
		}
		$specialization->delete();
		return redirect(route('specializations.index',$specialization->discipline_id))->with(['success'=>'Branch updated successfully']);
    }
}
