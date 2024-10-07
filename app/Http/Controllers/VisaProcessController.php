<?php

namespace App\Http\Controllers;

use App\Models\VisaProcess;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\Role;
use App\Models\UploadDoc;

class VisaProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visa_processes=VisaProcess::all();
		return view('visa-processes.index',compact(['visa_processes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$countries=Country::get()->pluck('country','id')->prepend('Select');
      	return view('visa-processes.create',compact(['countries']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		//p($request->visa_documents);
		try{
			$visa_process=new VisaProcess();
			$visa_process->fill($request->all());
			$visa_process->save();
		
		if(!empty($request->visa_documents)) {
		
			$errors = [];
			$allowed_formats = ['jpg', 'jpeg', 'png', 'pdf']; // Add more formats if needed

				// Loop through each file
				foreach($_FILES['visa_documents']['tmp_name'] as $key => $tmp_name) {
						$file_name = $_FILES['visa_documents']['name'][$key];
					$file_size = $_FILES['visa_documents']['size'][$key];
					$file_tmp = $_FILES['visa_documents']['tmp_name'][$key];
					$file_type = $_FILES['visa_documents']['type'][$key];

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
						$upload_doc->document=$file_name;
						$upload_doc->visa_process_id=$visa_process->id;
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
				return redirect(route('visa-processes.index'))->with(['error' => 'Record already existed!!']);
			}
		}
		
        return redirect(route('visa-processes.index'))->with(['success'=>'1 Record inserted successfully!']);
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
        $visa_process=VisaProcess::findOrFail($id);
		if($did!=null)
			$doc_uploaded=UploadDoc::findOrFail($did);
		else
			$doc_uploaded=null;
	  	return view('visa-processes.show',compact(['visa_process','doc_uploaded']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
		$countries=Country::get()->pluck('country','id')->prepend('Select');
		$visa_process=visaProcess::findOrFail($id);
	  	return view('visa-processes.edit',compact(['visa_process','countries']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {	
		try{
			$visa_process=VisaProcess::findOrFail($id);
			$visa_process->fill($request->all());
			
			if(!empty($request->visa_documents)) {
		
				$errors = [];
				$allowed_formats = ['jpg', 'jpeg', 'png', 'pdf']; // Add more formats if needed

				// Loop through each file
				foreach($_FILES['visa_documents']['tmp_name'] as $key => $tmp_name) {
					$file_name = $_FILES['visa_documents']['name'][$key];
					$file_size = $_FILES['visa_documents']['size'][$key];
					$file_tmp = $_FILES['visa_documents']['tmp_name'][$key];
					$file_type = $_FILES['visa_documents']['type'][$key];

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
						$upload_doc->visa_process_id=$visa_process->id;
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
			
			$visa_process->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('visa-processes.index'))->with(['error' => 'Record already existed!!']);
			}
		}
        return redirect(route('visa-processes.index'))->with(['success'=>'1 Record updated successfully!']);
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
	    try{
			$visa_process=VisaProcess::findOrFail($id);
			$visa_process->forceDelete();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1451){
				return redirect(route('standard-operating-procedures.index'))->with(['error' => 'Record has many relations, so that not able to delete!!']);
			}
		}
        return redirect(route('visa-processes.index'))->with(['success'=>'1 Record deleted successfully!']);
    }
	
	public function getAgents($id)
    {
		$role=Role::where('role','Agent')->first();
		//$country=Country::findOrFail($id);
		//$users=$country->users()->where('role_id',$role->id)->pluck('name','id');   
		$users=User::where('role_id',$role->id)->pluck('name','id');   
        return response()->json($users->toArray());
    }
}
