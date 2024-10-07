<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs=[
			['program'=>'Bachelors','created_by'=>1,'created_at'=>Carbon::now()],
			['program'=>'Masters','created_by'=>1,'created_at'=>Carbon::now()]
		];
		foreach($programs as $program){
			DB::table('programs')->insert($program);
		}
    }
}
