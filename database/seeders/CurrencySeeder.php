<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $items = [
              	
					['currency' => '', 'code' => '','icon' =>'fa fa-btc', 'currency' =>'btc', 'description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-cny', 'currency' =>'cny', 'description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-dollar', 'currency' =>'dollar','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-eur', 'currency' =>'eur','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-euro', 'currency' =>'euro','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-gbp', 'currency' =>'gbp','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-gg', 'currency' =>'gg','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-gg-circle', 'currency' =>'gg-circle','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-ils', 'currency' =>'ils','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-inr', 'currency' =>'inr','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-jpy', 'currency' =>'jpy','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-krw', 'currency' =>'krw','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-money', 'currency' =>'money','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-rmb', 'currency' =>'rmb','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-rouble', 'currency' =>'rouble','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-rub', 'currency' =>'rub','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-ruble', 'currency' =>'ruble','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-rupee', 'currency' =>'rupee','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-shekel', 'currency' =>'shekel','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-sheqel', 'currency' =>'sheqel','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-try', 'currency' =>'try','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-turkish-lira', 'currency' =>'urkish-lira','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-usd', 'currency' =>'usd','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-won', 'currency' =>'won','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
					['currency' => '', 'code' => '','icon' =>'fa fa-yen', 'currency' =>'yen','description' => '','created_by'=>1,'created_at'=>Carbon::now()],
				
				];
				
				foreach($items as $item){
					DB::table('currencies')->insert([
						"currency"=>ucfirst($item["currency"]),
						"code"=>substr(strtoupper($item["currency"]),0,2),
						"icon"=>$item["icon"],
						"description"=>$item["description"],
						"created_at"=>$item["created_at"],
						"created_by"=>$item["created_by"],
					]);  
			 
				}
    }
}
