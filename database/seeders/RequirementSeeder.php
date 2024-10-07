<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $requirements=[
			['requirement'=>'IELTS','code'=>'ielts','created_by'=>1,'created_at'=>Carbon::now()],
			['requirement'=>'GRE','code'=>'gre','created_by'=>1,'created_at'=>Carbon::now()],
			['requirement'=>'DULINGO','code'=>'dulingo','created_by'=>1,'created_at'=>Carbon::now()]
		];
		foreach($requirements as $requirement){
			DB::table('requirements')->insert($requirement);
		}
    }
}
