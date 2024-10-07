<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class DurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
	 
    public function run(): void
    {
		
        $durations=[
			['duration'=>'1 Year','created_by'=>1,'created_at'=>Carbon::now()],
			['duration'=>'2 Years','created_by'=>1,'created_at'=>Carbon::now()],
			['duration'=>'3 Years','created_by'=>1,'created_at'=>Carbon::now()],
			['duration'=>'4 Years','created_by'=>1,'created_at'=>Carbon::now()],
			['duration'=>'5 Years','created_by'=>1,'created_at'=>Carbon::now()]
		];
		
		foreach($durations as $duration){
			DB::table('durations')->insert($duration);
		}
		
    }
}
