<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PlayersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 300) as $index)
		{
			Player::create([
				'first_name' =>$faker->firstNameMale,
				'last_name' =>$faker->lastName,
				'goals_scored' =>rand ( 0 , 34 ),		
				'team_id' =>rand ( 1 , 20 ),
			]);
		}
	}

}