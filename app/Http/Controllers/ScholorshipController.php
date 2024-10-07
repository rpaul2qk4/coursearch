<?php

namespace App\Http\Controllers;

use App\Models\Scholorship;
use Illuminate\Http\Request;

use App\Models\VisaProcess;
use App\Models\User;
use App\Models\Country;
use App\Models\Role;
use App\Models\UploadDoc;
use App\Models\Specialization;


class ScholorshipController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scholorships=Scholorship::all();
		return view('scholorships.index',compact(['scholorships']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$countries=Country::get()->pluck('country','id')->prepend('Select');
      	return view('scholorships.create',compact(['countries']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		//p($request->sholorship_documents);
		try{
			$scholorship=new Scholorship();
			$scholorship->fill($request->all());
			$scholorship->save();
		
			if(!empty($request->scholorship_documents)) {
			
				$errors = [];
				$allowed_formats = ['jpg', 'jpeg', 'png', 'pdf']; // Add more formats if needed

				// Loop through each file
				foreach($_FILES['scholorship_documents']['tmp_name'] as $key => $tmp_name) {
					$file_name = $_FILES['scholorship_documents']['name'][$key];
					$file_size = $_FILES['scholorship_documents']['size'][$key];
					$file_tmp = $_FILES['scholorship_documents']['tmp_name'][$key];
					$file_type = $_FILES['scholorship_documents']['type'][$key];

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
						//echo "File '$new_file_name' uploaded successfully.<br>";
						$upload_doc=new UploadDoc();
						$upload_doc->document=$new_file_name;
						$upload_doc->scholorship_id=$scholorship->id;
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
				return redirect(route('scholorships.index'))->with(['error' => 'Record already existed!!']);
			}
		}
		
        return redirect(route('scholorships.index'))->with(['success'=>'1 Record inserted successfully!']);
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
        $scholorship=Scholorship::findOrFail($id);
		if($did!=null)
			$doc_uploaded=UploadDoc::findOrFail($did);
		else
			$doc_uploaded=null;
	  	return view('scholorships.show',compact(['scholorship','doc_uploaded']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
		$countries=Country::get()->pluck('country','id')->prepend('Select');
		$scholorship=Scholorship::findOrFail($id);
		$specializations=Specialization::where('discipline_id',$scholorship->discipline_id)->get()->pluck('specialization','id')->prepend('Select');
		
	  	return view('scholorships.edit',compact(['scholorship','countries','specializations']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {	
		try{
			$scholorship=Scholorship::findOrFail($id);
			$scholorship->fill($request->all());
			
			if(!empty($request->scholorship_documents)) {
		
				$errors = [];
				$allowed_formats = ['jpg', 'jpeg', 'png', 'pdf']; // Add more formats if needed

				// Loop through each file
				foreach($_FILES['scholorship_documents']['tmp_name'] as $key => $tmp_name) {
					$file_name = $_FILES['scholorship_documents']['name'][$key];
					$file_size = $_FILES['scholorship_documents']['size'][$key];
					$file_tmp = $_FILES['scholorship_documents']['tmp_name'][$key];
					$file_type = $_FILES['scholorship_documents']['type'][$key];

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
						$upload_doc->scholorship_id=$scholorship->id;
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
			
			$scholorship->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('scholorships.index'))->with(['error' => 'Record already existed!!']);
			}
		}
        return redirect(route('scholorships.index'))->with(['success'=>'1 Record updated successfully!']);
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
			$scholorship=Scholorship::findOrFail($id);
			$scholorship->forceDelete();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1451){
				return redirect(route('scholorships.index'))->with(['error' => 'Record has many relations, so that not able to delete!!']);
			}
		}
        return redirect(route('scholorships.index'))->with(['success'=>'1 Record deleted successfully!']);
   
    }
}
