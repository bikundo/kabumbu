@extends('layouts.master')

@section('main')

<h1>Current League Table</h1>

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

@stop
