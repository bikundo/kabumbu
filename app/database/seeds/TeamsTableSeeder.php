<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TeamsTableSeeder extends Seeder {


	public function run()
	{
		$faker = Faker::create();
		$items = [0,5000,10000,20000, 30000, 42000, 50000, 20000, 25000, 30000, 35000, 45000, 15000,50000];

		foreach(range(1, 20) as $index)
		{
			Team::create([
				'name' =>$faker->streetName,
				'coach' => $faker->name,
				'amount_paid' =>$items[array_rand($items)],
				 			
			]);
		}
	}

}
