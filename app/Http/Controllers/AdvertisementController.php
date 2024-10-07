<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;

class AdvertisementController extends Controller
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
    public function store(StoreAdvertisementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdvertisementRequest $request, $id)
    {
		$advertisement=Advertisement::findOrFail($id); 
		
        $fileType = $_FILES['advertisement']['type'];
		$fileActualExt = explode('/',$fileType);
		$allowed = array('jpeg','jpg','png');

			if(!in_array($fileActualExt[1],$allowed)){
				return redirect()->back()->with('error','Please upload image jpg/jpeg/png types only!'); 
			} 
		
		//store the files in db;		
		if($file = $request->file('advertisement')){
			
				if(!empty($advertisement->advertisement)){
					$file_path = filePath($advertisement->advertisement);
					if(file_exists($file_path))
					unlink($file_path);
				}	
			
				$image_name = md5(rand(1000,10000));
				$ext = strtolower($file->getClientOriginalExtension());
				$image_full_name = $image_name.'.'.$ext;			  
				$uploade_path = 'uploads/';
				$image_url = $uploade_path.$image_full_name;
				$file->move($uploade_path,$image_full_name);
				
				$advertisement->advertisement =$image_url;
				$advertisement->save();
							  
		}
		
		return redirect(route('add_clients.show',$advertisement->add_client_id))->with(['success'=>'1 Record deleted successfully!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $advertisement=Advertisement::findOrFail($id); 
		if(!empty($advertisement->advertisement)){
			$file_path = filePath($advertisement->advertisement);
			if(file_exists($file_path))
			unlink($file_path);
		}		
      
		$advertisement->delete();
		return redirect(route('add_clients.show',$advertisement->add_client_id))->with(['success'=>'1 Record deleted successfully!']);

  
    }
}
