<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $items = [
     		
					['id' => 1, 'code' => 'AN', 'state'=> 'Andaman and Nicobar Islands','country_id'=>105],
					['id' => 2, 'code' => 'AP', 'state'=> 'Andhra Pradesh','country_id'=>105],
					['id' => 3, 'code' => 'AR', 'state'=> 'Arunachal Pradesh','country_id'=>105],
					['id' => 4, 'code' => 'AS', 'state'=> 'Assam','country_id'=>105],
					['id' => 5, 'code' => 'BR', 'state'=> 'Bihar','country_id'=>105],
					['id' => 6, 'code' => 'CH', 'state'=> 'Chandigarh','country_id'=>105],
					['id' => 7, 'code' => 'CT', 'state'=> 'Chhattisgarh','country_id'=>105],
					['id' => 8, 'code' => 'DN', 'state'=> 'Dadra and Nagar Haveli','country_id'=>105],
					['id' => 9, 'code' => 'DD', 'state'=> 'Daman and Diu','country_id'=>105],
					['id' => 10, 'code' => 'DL', 'state'=> 'Delhi','country_id'=>105],
					['id' => 11, 'code' => 'GA', 'state'=> 'Goa','country_id'=>105],
					['id' => 12, 'code' => 'GJ', 'state'=> 'Gujarat','country_id'=>105],
					['id' => 13, 'code' => 'HR', 'state'=> 'Haryana','country_id'=>105],
					['id' => 14, 'code' => 'HP', 'state'=> 'Himachal Pradesh','country_id'=>105],
					['id' => 15, 'code' => 'JK', 'state'=> 'Jammu and Kashmir','country_id'=>105],
					['id' => 16, 'code' => 'JH', 'state'=> 'Jharkhand','country_id'=>105],
					['id' => 17, 'code' => 'KA', 'state'=> 'Karnataka','country_id'=>105],
					['id' => 18, 'code' => 'KL', 'state'=> 'Kerala','country_id'=>105],
					['id' => 19, 'code' => 'LD', 'state'=> 'Lakshadweep','country_id'=>105],
					['id' => 20, 'code' => 'MP', 'state'=> 'Madhya Pradesh','country_id'=>105],
					['id' => 21, 'code' => 'MH', 'state'=> 'Maharashtra','country_id'=>105],
					['id' => 22, 'code' => 'MN', 'state'=> 'Manipur','country_id'=>105],
					['id' => 23, 'code' => 'ML', 'state'=> 'Meghalaya','country_id'=>105],
					['id' => 24, 'code' => 'MZ', 'state'=> 'Mizoram','country_id'=>105],
					['id' => 25, 'code' => 'NL', 'state'=> 'Nagaland','country_id'=>105],
					['id' => 26, 'code' => 'OR', 'state'=> 'Odisha','country_id'=>105],
					['id' => 27, 'code' => 'PY', 'state'=> 'Puducherry','country_id'=>105],
					['id' => 28, 'code' => 'PB', 'state'=> 'Punjab','country_id'=>105],
					['id' => 29, 'code' => 'RJ', 'state'=> 'Rajasthan','country_id'=>105],
					['id' => 30, 'code' => 'SK', 'state'=> 'Sikkim','country_id'=>105],
					['id' => 31, 'code' => 'TN', 'state'=> 'Tamil Nadu','country_id'=>105],
					['id' => 32, 'code' => 'TS', 'state'=> 'Telangana','country_id'=>105],
					['id' => 33, 'code' => 'TR', 'state'=> 'Tripura','country_id'=>105],
					['id' => 34, 'code' => 'UP', 'state'=> 'Uttar Pradesh','country_id'=>105],
					['id' => 35, 'code' => 'UT', 'state'=> 'Uttarakhand','country_id'=>105],
					['id' => 36, 'code' => 'WB', 'state'=> 'West Bengal','country_id'=>105]
				];
        
	
		foreach($items as $item){
			 DB::table('states')->insert([
					"state"=>$item["state"],
					"code"=>$item["code"],
					"country_id"=>$item["country_id"]
				]);  
			 
		}
    }
}
