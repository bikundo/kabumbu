@extends('layouts.master')

@section('main')

<div class="row" style="padding-top:20px;">
    <div class="col-md-7">
    <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Current League Table</h3>
  </div>
  <div class="panel-body">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Position</th>
                <th>Team</th>
                <th>Played</th>
                <th>Win</th>
                <th>Draw</th>
                <th>Lost</th>
                <th>G.F</th>
                <th>G.A</th>
                <th>G.D</th>
                <th>Points</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($games as $game)
                <tr>
                    <td>{{ $game->rank }}</td>
                    <td>{{ $teams->find($game->team)['name'] }}</td>
                    <td>{{ $game->played}}</td>
                    <td>{{$game->wins}}</td>
                    <td>{{ $game->draws }}</td>
                    <td>{{ $game->lost }}</td>
                    <td>{{$game->host_score}}</td>
                    <td>{{ $game->guest_score }}</td>
                    <td>{{ $game->goal_diff }}</td>
                    <td>{{ $game->score }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
    </div>
    <div class="col-md-5">
    <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">League Top Scorers</h3>
  </div>
  <div class="panel-body">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Team</th>
                <th>Goals scored</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($topscorers as $topscorer)
                <tr>
                    <td>{{{ $topscorer->first_name }}} {{{ $topscorer->last_name }}}</td>
                
                    <td>
                        @if ($teams->contains($topscorer->team_id))
                        {{{ $teams->find($topscorer->team_id)->name }}}
                        @else
                        Team doesn't exist
                        @endif
                    </td>
                    <td>{{{ $topscorer->goals_scored }}}</td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
    
    </div>
</div>



    

@stop
