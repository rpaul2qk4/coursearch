<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Redirect;

class RoleController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::all();
		return view('roles.index',compact(['roles']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
		try{
			$role = new Role();
			$role->fill($request->all());		
			$role->status = 'Active';		
			$role->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('roles.index'))->with(['error' => 'Given record already inserted!!']);
			}
		}
        return redirect(route('roles.index'))->with(['success'=>'1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
		$role=Role::findOrFail($id);
        return view('roles.show',compact(['role']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
     	$role=Role::findOrFail($id);
        return view('roles.edit',compact(['role']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		try{ 
			$role=Role::findOrFail($id);
			$role->fill($request->all());	
			$role->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('roles.index'))->with(['error' => 'Given record already inserted!!']);
			}
		}
        return redirect(route('roles.index'))->with(['success'=>'1 Record updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role=Role::findOrFail($id);
      
		$role->delete();
		
        return redirect(route('roles.index'))->with(['success'=>'1 Record deleted successfully!']);

    }
	
}
