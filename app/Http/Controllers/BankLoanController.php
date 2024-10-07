<?php

namespace App\Http\Controllers;

use App\Models\BankLoan;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\ReqDoc;
use App\Models\UploadDoc;

class BankLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$bank_loans=BankLoan::all();
        return view('bank_loans.index',compact(['bank_loans']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$countries=Country::get()->pluck('country','id')->prepend('Select');
        return view('bank_loans.create',compact(['countries']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     // p(count($request->docs_required));
		
				$bank_loan = new BankLoan();
				$bank_loan->fill($request->all());
				$bank_loan->save();
				if(count($request->docs_required)>0) {
					foreach($request->docs_required as $key => $value) {
						$req_doc=new ReqDoc();
						$req_doc->document=$value;
						$req_doc->bank_loan_id=$bank_loan->id;
						$req_doc->doc_type='';
						$req_doc->save();
					}
				}
				if(!empty($request->upload_docs)) {
				
					$errors = [];
					$allowed_formats = ['jpg', 'jpeg', 'png', 'pdf']; // Add more formats if needed

						// Loop through each file
					foreach($_FILES['upload_docs']['tmp_name'] as $key => $tmp_name) {
					$file_name = $_FILES['upload_docs']['name'][$key];
					$file_size = $_FILES['upload_docs']['size'][$key];
					$file_tmp = $_FILES['upload_docs']['tmp_name'][$key];
					$file_type = $_FILES['upload_docs']['type'][$key];

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
								move_uploaded_file($file_tmp, $upload_path);
								//echo "File '$file_name' uploaded successfully.<br>";
								$upload_doc=new UploadDoc();
								$upload_doc->document=$file_name;
								$upload_doc->bank_loan_id=$bank_loan->id;
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
				
			
        return redirect(route('bank_loans.index'))->with(['success'=>'1 Record inserted successfully!']);
   
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bank_loan=BankLoan::findOrFail($id); 
        return view('bank_loans.show',compact(['bank_loan']));
  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
		$bank_loan=BankLoan::findOrFail($id); 
        $countries=Country::get()->pluck('country','id')->prepend('Select');
        $states=State::where('country_id',$bank_loan->country_id)->get()->pluck('state','id')->prepend('Select');
		//p($states);
        return view('bank_loans.edit',compact(['countries','states','bank_loan']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $bank_loan = BankLoan::findOrFail($id);
		$bank_loan->fill($request->all());		
		
		$bank_loan->save();
		$docs_required=$request->docs_required;
		
		if(!empty($docs_required[0])) {
			foreach($request->docs_required as $key => $value) {
				$req_doc=new ReqDoc();
				$req_doc->document=$value;
				$req_doc->bank_loan_id=$bank_loan->id;
				$req_doc->doc_type='';
				$req_doc->save();
			}
		}  
				
		if(!empty($request->upload_docs)) {
				
			$errors = [];
			$allowed_formats = ['jpg', 'jpeg', 'png', 'pdf']; // Add more formats if needed

				// Loop through each file
				foreach($_FILES['upload_docs']['tmp_name'] as $key => $tmp_name) {
						$file_name = $_FILES['upload_docs']['name'][$key];
					$file_size = $_FILES['upload_docs']['size'][$key];
					$file_tmp = $_FILES['upload_docs']['tmp_name'][$key];
					$file_type = $_FILES['upload_docs']['type'][$key];

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
						$upload_doc->bank_loan_id=$bank_loan->id;
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
		
		return redirect(route('bank_loans.index'))->with(['success'=>'1 Record updated successfully!']);  
    }


	public function generateRandomString($length = 10) {
	   $bytes = random_bytes(ceil($length / 2));
	   $randomString = substr(bin2hex($bytes), 0, $length);

	   return $randomString;
	}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bank_loan = BankLoan::findOrFail($id);
		
		$bank_loan->forcedelete();
		return redirect(route('bank_loans.index'))->with(['success'=>'1 Record deleted successfully!']);  
    }
}
