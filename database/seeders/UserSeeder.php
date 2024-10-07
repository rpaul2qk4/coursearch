<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[
			['name'=>'Admin','email'=>'admin@gmail.com','mobile'=>'7788994455','password'=>Hash::make('abcd1234'),'role_id'=>1,'photo'=>null,'created_at'=>Carbon::now()],			
			['name'=>'Student','email'=>'student@gmail.com','mobile'=>'7788994455','password'=>Hash::make('abcd1234'),'role_id'=>2,'photo'=>null,'created_at'=>Carbon::now()]			
		];
		foreach($users as $user){
			DB::table('users')->insert($user);
		}
    }
}
