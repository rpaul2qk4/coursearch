<?php

namespace App\Http\Controllers;

use App\Models\Format;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFormatRequest;
use App\Http\Requests\UpdateFormatRequest;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formats = Format::all();
		return view('formats.index', compact(['formats'])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('formats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormatRequest $request)
    {
        $format = new Format;
		try{
			$format->fill($request->all());
			$format->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('formats.index'))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('formats.index'))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $format = Format::findOrFail($id);
		return view('formats.show', compact(['format']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $format = Format::findOrFail($id);
		return view('formats.edit', compact(['format']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormatRequest $request, $id)
    {
        $format = Format::findOrFail($id);		
		try{			
			$format->fill($request->all());
			$format->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('formats.index'))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('formats.index'))->with(['success'=>'Format updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $format=Format::findOrFail($id);
		
		if($format->branh_specialization_fees->count()){
			return redirect(route('formats.index'))->with('error','Sorry not able to delete, it has many relations!');
		}
		
		$format->delete();
		
		return redirect(route('formats.index'))->with('success','1 Record deleted successfully!');
    }
}
