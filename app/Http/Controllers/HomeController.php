<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use App\Models\Discipline;
use App\Models\BranchSpecialization;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$users=User::all();		
		$roles=Role::all();
		$countries=Country::all();
		$disciplines=Discipline::all();
		$branch_specializations=BranchSpecialization::where('course_id','<>',null)->get();
	/* 	 foreach($disciplines as $discipline){
			if($discipline->branch_specializations->count()){
				ep($discipline->discipline.$discipline->branch_specializations->count());
			}
		}die();  */
		
        return view('home',compact(['users','roles','countries','disciplines','branch_specializations']));
    }
	
	public function userIndex()
    {
        return view('user-home');
    }
	
	public function agentIndex()
    {
        return view('agent-home');
    }
}
