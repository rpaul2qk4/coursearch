<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles=[
			['role'=>'Admin','created_at'=>Carbon::now()],
			['role'=>'User','created_at'=>Carbon::now()]
		];
		foreach($roles as $role){
			DB::table('roles')->insert($role);
		}
    }
}
