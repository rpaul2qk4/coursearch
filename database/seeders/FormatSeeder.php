<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $formats=[
			['format'=>'Full-time','created_by'=>1,'created_at'=>Carbon::now()],
			['format'=>'Part-time','created_by'=>1,'created_at'=>Carbon::now()]
			
		];
		
		foreach($formats as $format){
			DB::table('formats')->insert($format);
		}
    }
}
