<?php

namespace App\Http\Controllers;

use App\Models\AddClient;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddClientRequest;
use App\Http\Requests\UpdateAddClientRequest;

class AddClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $add_clients=AddClient::all();
		return view('add_clients.index',compact(['add_clients']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddClientRequest $request)
    {
        $add_client=new AddClient();
		$add_client->fill($request->all());
		$add_client->save();
				
		$fileTypes = $_FILES['advertisements']['type'];
		
		foreach($fileTypes as $fileType){
			$fileActualExt = explode('/',$fileType);
			$allowed = array('jpeg','jpg','png');

			if(!in_array($fileActualExt[1],$allowed)){
				return redirect()->back()->with('error','Please upload image jpg/jpeg/png types only!'); 
			} 
		}
		//store the files in db;		
		 if($file = $request->file('advertisements')){
			foreach($file as $file){
			  $image_name = md5(rand(1000,10000));
			  $ext = strtolower($file->getClientOriginalExtension());
			  $image_full_name = $image_name.'.'.$ext;
			  
			  $uploade_path = 'uploads/';
			  $image_url = $uploade_path.$image_full_name;
			  $file->move($uploade_path,$image_full_name);
			  //$advertisement[] = $image_url;
				Advertisement::insert([
				  'advertisement' => $image_url,
				  'add_client_id' => $add_client->id,
				  'created_by' => $add_client->created_by,
				]);			  
			}		
		}
		
		
		return redirect(route('add_clients.index'))->with(['success'=>'1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $add_client=AddClient::findOrFail($id);
		return view('add_clients.show',compact(['add_client']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $add_client=AddClient::findOrFail($id);
		return view('add_clients.edit',compact(['add_client']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddClientRequest $request, $id)
    {
		$add_client=AddClient::findOrFail($id);
        $add_client->fill($request->all());
		$add_client->save();
		
		$fileTypes = $_FILES['advertisements']['type'];
		//p($fileTypes);
		if($fileTypes[0]){
			
			
			foreach($fileTypes as $fileType){
				$fileActualExt = explode('/',$fileType);
				$allowed = array('jpeg','jpg','png');

				if(!in_array($fileActualExt[1],$allowed)){
					return redirect()->back()->with('error','Please upload image jpg/jpeg/png types only!'); 
				} 
			}
			//store the files in db;		
			if($file = $request->file('advertisements')){
				foreach($file as $file){
				  $image_name = md5(rand(1000,10000));
				  $ext = strtolower($file->getClientOriginalExtension());
				  $image_full_name = $image_name.'.'.$ext;			  
				  $uploade_path = 'uploads/';
				  $image_url = $uploade_path.$image_full_name;
				  $file->move($uploade_path,$image_full_name);
				  //$advertisement[] = $image_url;
					Advertisement::insert([
					  'advertisement' => $image_url,
					  'add_client_id' => $add_client->id,
					  'created_by' => $add_client->created_by,
					]);				  
				}		
			}
		}	
		
		return redirect(route('add_clients.index'))->with(['success'=>'1 Record inserted successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $add_client=AddClient::findOrFail($id); 
		if($add_client->advertisements->count()){
			return redirect(route('add_clients.index'))->with(['error'=>'Please first you delete advertisements!!']);
		}		
		$add_client->delete();
		return redirect(route('add_clients.index'))->with(['success'=>'1 Record deleted successfully!']);

  
    }
}
