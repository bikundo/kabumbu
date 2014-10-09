@extends('layouts.master')

@section('main')

<h1>New Fixture</h1>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {{ Form::open(array('route' => 'games.store')) }}
    <ul>
        <li>
            {{ Form::label('host_team_id', 'Home team:') }}
            <select name="host_team_id" class="form-control">
            @foreach ($teams as $element)
                 <option value="{{$element->id}}">{{$element->name}}</option>
            @endforeach
            </select>
        </li>
        <li>
            {{ Form::label('host_team_id', 'Away team:') }}
            <select name="guest_team_id" class="form-control">
            @foreach ($teams as $element)
                 <option value="{{$element->id}}">{{$element->name}}</option>
            @endforeach
            </select>
        </li>
        

        <li>
            {{ Form::label('host_score', 'Host_score:') }}
            {{ Form::text('host_score', '', array('class' => 'form-control', 'placeholder'=>'leave empty if game is not yet played')) }}
        </li>

        <li>
            {{ Form::label('guest_score', 'Guest_score:') }}
            {{ Form::text('guest_score', '', array('class' => 'form-control', 'placeholder'=>'leave empty if game is not yet played')) }}
        </li>

        <li>
            {{ Form::label('time', 'Date:') }}
            {{ Form::text('time', '', array('class' => 'form-control', 'placeholder'=>'Date')) }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
        </li>
    </ul>
{{ Form::close() }}
    </div>

</div>



@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


