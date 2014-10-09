<?php

class Game extends Eloquent {
	protected $guarded = array();

		protected $fillable = array('host_team_id','guest_team_id','time');


	public static $rules = array(
		'host_team_id' => 'required',
		'guest_team_id' => 'required',
		'time' => 'required'
	);
}
