<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::all();
		return view('attendances.index', compact(['attendances'])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('attendances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        $attendance = new Attendance;
		$attendance->fill($request->all());
		$attendance->save();
		return redirect(route('attendances.index'))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $attendance = Attendance::findOrFail($id);
		return view('attendances.show', compact(['attendance']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
		return view('attendances.edit', compact(['attendance']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, $id)
    {
        $attendance = Attendance::findOrFail($id);		
					
		$attendance->fill($request->all());
		$attendance->save();
		return redirect(route('attendances.index'))->with(['success'=>'Attendance updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $attendance=Attendance::findOrFail($id);
		if($attendance->branch_specializations->count()){
			return redirect(route('attendances.index'))->with('error','Sorry not able to delete, it has many relations!');
		}
		$attendance->delete();
		return redirect(route('attendances.index'))->with('success','1 Record deleted successfully!');
    }
}
