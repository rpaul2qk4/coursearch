<?php

namespace App\Http\Controllers;

use App\Models\UploadDoc;
use Illuminate\Http\Request;

class UploadDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UploadDoc $uploadDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UploadDoc $uploadDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $upload_doc = UploadDoc::findOrFail($id);
		
			if(!empty($request->document)) {				
				$errors = [];
				$allowed_formats = ['jpg', 'jpeg', 'png', 'pdf']; // Add more formats if needed
		
				$file_name = $_FILES['document']['name'];
				$file_size = $_FILES['document']['size'];
				$file_tmp = $_FILES['document']['tmp_name'];
				$file_type = $_FILES['document']['type'];

				// Check file format
				$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
				
				if(!in_array($file_ext, $allowed_formats)) {
					$errors[] = "$file_name has invalid format.";
				}

				// If no errors, move the file
				if(empty($errors)) {
					$upload_path = 'uploads/' . $file_name;
					move_uploaded_file($file_tmp, $upload_path);
					//echo "File '$file_name' uploaded successfully.<br>";
					
					$upload_doc->document=$file_name;
					$upload_doc->doc_type=$file_ext;						
				}
			}
				
			$upload_doc->save();
		
		return redirect(route('bank_loans.edit',$upload_doc->bank_loan->id))->with(['success'=>'1 Record deleted successfully!']);  
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $upload_doc = UploadDoc::findOrFail($id);		
		$upload_doc->forceDelete();
		return redirect(route('bank_loans.edit',$upload_doc->bank_loan->id))->with(['success'=>'1 Record deleted successfully!']);  
  
    }
	
	public function visaProcess($id)
    {
        $upload_doc = UploadDoc::findOrFail($id);	
		$visa_process_id=$upload_doc->visa_process_id;
		$upload_doc->forceDelete();
		return redirect(route('visa-processes.show',$visa_process_id))->with(['success'=>'1 Record deleted successfully!']);  
  
    }
}
