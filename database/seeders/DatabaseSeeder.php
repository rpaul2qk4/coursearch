<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
				
		$this->call(RoleSeeder::class);
		$this->call(UserSeeder::class);
		$this->call(CountrySeeder::class);
		$this->call(StateSeeder::class);
		$this->call(CitySeeder::class);
		$this->call(DurationSeeder::class);
		$this->call(FormatSeeder::class);
		$this->call(ProgramSeeder::class);
		$this->call(AttendanceSeeder::class);
		$this->call(RequirementSeeder::class);
		$this->call(CurrencySeeder::class);
    }
}
