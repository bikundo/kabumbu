<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GamesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		

		foreach(range(1, 400) as $index)
		{	$randid = rand ( 0 , 19 );
			Game::create([		
				'host_team_id' =>$randid,
				'guest_team_id' =>$randid + 1,
				'host_score' =>rand ( 0 , 7 ),
				'guest_score' =>rand ( 0 , 7 ),
				'time' =>$faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'),
			]);
		}
	}

}
