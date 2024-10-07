<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attendances=[
			['attendance'=>'On CAmpus learning','created_by'=>1,'created_at'=>Carbon::now()],
			['attendance'=>'Online Learning','created_by'=>1,'created_at'=>Carbon::now()],
			['attendance'=>'Blended Learning','created_by'=>1,'created_at'=>Carbon::now()]
			
		];
		
		foreach($attendances as $attendance){
			DB::table('attendances')->insert($attendance);
		}
    }
}
