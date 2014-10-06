<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{	$teams =  Team::all();
	$games = DB::select( 'SELECT team, COUNT( * ) played, COUNT( 
CASE WHEN host_score > guest_score
THEN 1 
END ) wins, COUNT( 
CASE WHEN guest_score > host_score
THEN 1 
END ) lost, COUNT( 
CASE WHEN host_score = guest_score
THEN 1 
END ) draws, SUM( host_score ) host_score, SUM( guest_score ) guest_score, SUM( host_score ) - SUM( guest_score ) goal_diff, SUM( 
CASE WHEN host_score > guest_score
THEN 3 
ELSE 0 
END + 
CASE WHEN host_score = guest_score
THEN 1 
ELSE 0 
END ) score
FROM (

SELECT host_team_id team, host_score, guest_score
FROM games
UNION ALL 
SELECT guest_team_id, guest_score, host_score
FROM games
)a
GROUP BY team
ORDER BY score DESC , goal_diff DESC' );
	foreach (array_values($games) as $i => $value) {
  		$value->rank = $i + 1;
}

	 return View::make('games.table', compact('games', 'teams'));
});
Route::get('asdf', function()
{	
	$games = DB::select( 'SELECT team, COUNT( * ) played, COUNT( 
CASE WHEN host_score > guest_score
THEN 1 
END ) wins, COUNT( 
CASE WHEN guest_score > host_score
THEN 1 
END ) lost, COUNT( 
CASE WHEN host_score = guest_score
THEN 1 
END ) draws, SUM( host_score ) host_score, SUM( guest_score ) guest_score, SUM( host_score ) - SUM( guest_score ) goal_diff, SUM( 
CASE WHEN host_score > guest_score
THEN 3 
ELSE 0 
END + 
CASE WHEN host_score = guest_score
THEN 1 
ELSE 0 
END ) score
FROM (

SELECT host_team_id team, host_score, guest_score
FROM games
UNION ALL 
SELECT guest_team_id, guest_score, host_score
FROM games
)a
GROUP BY team
ORDER BY score DESC , goal_diff DESC' );

	foreach (array_values($games) as $i => $value) {
  		$value->rank = $i + 1;
}

	 return Response::json($games);
});

Route::controller('users', 'UsersController');

Route::group(array('before' => 'auth'), function()
{
    Route::resource('teams', 'TeamsController', array('except' => array('show')));

    Route::resource('players', 'PlayersController', array('except' => array('show')));

    Route::resource('games', 'GamesController', array('except' => array('show')));
});
