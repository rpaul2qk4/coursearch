<?php

namespace App\Http\Controllers;

use App\Models\Semister;
use Illuminate\Http\Request;

class SemisterController extends Controller
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
    public function show(Semister $semister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semister $semister)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semister $semister)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sem=Semister::findOrFail($id);
		$sem->forceDelete();
		return response()->json(['message'=>'record deleted']);
    }
}
