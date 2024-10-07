<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [ 
		
					//Telangana districts

					['city' => 'Adilabad','code'=>'AD','state_id'=>32,'country_id'=>105,],
					['city' => 'Bhadradri Kothagudem','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Hanumakonda','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Hyderabad','code'=>'HY','state_id'=>32,'country_id'=>105,],
					['city' => 'Jagtial','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Jangaon','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Jayashankar Bhupalpally','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Jogulamba Gadwal','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Kamareddy','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Karimnagar','code'=>'KA','state_id'=>32,'country_id'=>105,],
					['city' => 'Khammam','code'=>'KH','state_id'=>32,'country_id'=>105,],
					['city' => 'Kumuram Bheem','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Mahabubabad','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Mahabubnagar','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Mancherial','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Medak','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Medchal-Malkajgiri','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Mulugu','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Nagarkurnool','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Nalgonda','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Narayanpet','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Nirmal','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Nizamabad','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Peddapalli','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Rajanna Sircilla','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Rangareddy','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Sangareddy','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Siddipet','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Suryapet','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Vikarabad','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Wanaparthy','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Warangal','code'=>'','state_id'=>32,'country_id'=>105,],
					['city' => 'Yadadri Bhuvanagiri','code'=>'','state_id'=>32,'country_id'=>105,],


			
		];

		foreach($items as $item){
			DB::table('cities')->insert([
				"city"=>$item["city"],  
				"code"=>$item["code"], 
				"state_id"=>$item["state_id"], 
				"country_id"=>$item["country_id"]
			]);  
			 
		}
    }
}
