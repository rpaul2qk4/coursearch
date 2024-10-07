<?php

namespace App\Http\Controllers;

use App\Models\ReqDoc;
use Illuminate\Http\Request;

class ReqDocController extends Controller
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
    public function show(ReqDoc $reqDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $req_doc = ReqDoc::findOrFail($id);		
		return view('bank_loans.edit',compact(['req_doc'])); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $req_doc = ReqDoc::findOrFail($id);
		$req_doc->document=$request->document;
		$req_doc->save();
		return redirect(route('bank_loans.edit',$req_doc->bank_loan->id))->with(['success'=>'1 Record deleted successfully!']);  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $req_doc = ReqDoc::findOrFail($id);		
		$req_doc->forcedelete();
		return redirect(route('bank_loans.edit',$req_doc->bank_loan->id))->with(['success'=>'1 Record deleted successfully!']);  
   
    }
}
