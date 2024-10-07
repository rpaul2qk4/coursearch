<?php

namespace App\Http\Controllers;

use App\Models\StandardOperatingProcedure;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Discipline;
use App\Models\UploadDoc;
use App\Models\State;
use App\Models\Specialization;

class StandardOperatingProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standard_operating_procedures=StandardOperatingProcedure::all();
		return view('standard-operating-procedures.index',compact(['standard_operating_procedures']));
    }

	public function getDispSpecializations($id)
    {
		$discipline=Discipline::findOrFail($id);
		$specializations=$discipline->specializations->pluck('specialization','id');
         return response()->json($specializations->toArray());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$countries=Country::get()->pluck('country','id')->prepend('Select');
		$disciplines=Discipline::get()->pluck('discipline','id')->prepend('Select');
      	return view('standard-operating-procedures.create',compact(['countries','disciplines']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		//p($request->sop_documents);
		try{
			$standard_operating_procedure=new StandardOperatingProcedure();
			$standard_operating_procedure->fill($request->all());
			$standard_operating_procedure->save();
		
		if(!empty($request->sop_documents)) {
		
			$errors = [];
			$allowed_formats = ['jpg', 'jpeg', 'png', 'pdf']; // Add more formats if needed

				// Loop through each file
				foreach($_FILES['sop_documents']['tmp_name'] as $key => $tmp_name) {
					$file_name = $_FILES['sop_documents']['name'][$key];
					$file_size = $_FILES['sop_documents']['size'][$key];
					$file_tmp = $_FILES['sop_documents']['tmp_name'][$key];
					$file_type = $_FILES['sop_documents']['type'][$key];

					// Check file format
					$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
					
					if(!in_array($file_ext, $allowed_formats)) {
						$errors[] = "$file_name has invalid format.";
					}
					
					$randomString = $this->generateRandomString();
					$path=explode('.',$file_name);
					$new_file_name=$path[0].'-'.$randomString.'.'.$file_ext;
					
					// If no errors, move the file
					if(empty($errors)) {
						$upload_path = 'uploads/' . $new_file_name;
						move_uploaded_file($file_tmp, $upload_path);
						//echo "File '$file_name' uploaded successfully.<br>";
						$upload_doc=new UploadDoc();
						$upload_doc->document=$new_file_name;
						$upload_doc->standard_operating_procedure_id=$standard_operating_procedure->id;
						$upload_doc->doc_type=$file_ext;
						$upload_doc->save();
					}
				}

				// Display any errors
				if(!empty($errors)) {
					 foreach($errors as $error) {
						echo $error . "<br>";
					} 
					
					return $errors;
				}
		}
		
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('standard-operating-procedures.index'))->with(['error' => 'Record already existed!!']);
			}
		}
		
        return redirect(route('standard-operating-procedures.index'))->with(['success'=>'1 Record inserted successfully!']);
    }

	public function generateRandomString($length = 10) {
	   $bytes = random_bytes(ceil($length / 2));
	   $randomString = substr(bin2hex($bytes), 0, $length);

	   return $randomString;
	}
    /**
     * Display the specified resource.
     */
    public function show($id,$did=null)
    {
	    $standard_operating_procedure=StandardOperatingProcedure::findOrFail($id);
		if($did!=null)
			$doc_uploaded=UploadDoc::findOrFail($did);
		else
			$doc_uploaded=[''=>''];
		//p($doc_uploaded);
	  	return view('standard-operating-procedures.show',compact(['standard_operating_procedure','doc_uploaded']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
		$standard_operating_procedure=StandardOperatingProcedure::findOrFail($id);
		$specializations=Specialization::where('discipline_id',$standard_operating_procedure->discipline_id)->get()->pluck('specialization','id')->prepend('Select');
		$countries=Country::get()->pluck('country','id')->prepend('Select');
		$states=State::where('country_id',$standard_operating_procedure->country_id)->get()->pluck('state','id')->prepend('Select');
		$disciplines=Discipline::get()->pluck('discipline','id')->prepend('Select'); 
		
      	return view('standard-operating-procedures.edit',compact(['standard_operating_procedure','countries','disciplines','states','specializations']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {	
		try{
			$standard_operating_procedure=StandardOperatingProcedure::findOrFail($id);
			$standard_operating_procedure->fill($request->all());
			$standard_operating_procedure->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('standard-operating-procedures.index'))->with(['error' => 'Record already existed!!']);
			}
		}
        return redirect(route('standard-operating-procedures.index'))->with(['success'=>'1 Record updated successfully!']);
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
			$standard_operating_procedure=StandardOperatingProcedure::findOrFail($id);
			$standard_operating_procedure->forceDelete();
        } catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1451){
				return redirect(route('standard-operating-procedures.index'))->with(['error' => 'Record has many relations, so that not able to delete!!']);
			}
		}
		
		return redirect(route('standard-operating-procedures.index'))->with(['success'=>'1 Record deleted successfully!']);
   
    }
}
