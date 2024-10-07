<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discipline;
use App\Models\AddClient;
use App\Models\Advertisement;
use App\Models\User;
use App\Models\Role;
use App\Models\BankLoan;
use App\Models\Specialization;
use App\Models\StandardOperatingProcedure;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$disciplines=Discipline::all();
		$advertisements=Advertisement::all();
        return view('welcome',compact('disciplines','advertisements'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
	
	public function reqDocsDetails(Request $request)
    {		
		$dis_sp_recs=$request->all();
		//p($dis_sp_recs['discipline_id']);
		if(count($dis_sp_recs)>1){
		$standard_operating_procedure=StandardOperatingProcedure::where('discipline_id',$dis_sp_recs['discipline_id'])->where('specialization_id',$dis_sp_recs['specialization_id'])->first();		
		
		$sop_sp_ids=StandardOperatingProcedure::where('discipline_id',$dis_sp_recs['discipline_id'])->get()->pluck('specialization_id')->toArray();
		$specializations=Specialization::whereIn('id',$sop_sp_ids)->get()->pluck('specialization','id');
		}else{
			$standard_operating_procedure=null;
			//p(empty($standard_operating_procedure));
			$specializations=null;
			$dis_sp_recs['discipline_id']=null;
			$dis_sp_recs['specialization_id']=null;
		}
	    return view('requirements.req-docs-details',compact(['standard_operating_procedure','dis_sp_recs','specializations']));
    }
	
	public function loanDetails(Request $request)
    {
		$countryId=$request->country_id??null;
		if(!empty($countryId))
			$bank_loans=BankLoan::where('country_id',$countryId)->get();
		else
			$bank_loans=BankLoan::get();				
		
        return view('requirements.loan-details',compact(['bank_loans','countryId']));
    }
	
	public function visaProcessingDetails(Request $request)
    {
		//p($request->country_id);
		$role=Role::where('role','Agent')->get()->first();
		$countryId=$request->country_id??null;
		if(!empty($countryId))
			$agents=User::where('role_id',$role->id)->where('country_id',$countryId)->get();
		else
			$agents=User::where('role_id',$role->id)->get();
		
        return view('requirements.visa-processing-details',compact(['agents','countryId']));
    }
	
	public function scholorshipDetails(Request $request)
    {
		
		
        return view('requirements.scholorship-details');
    }
}
