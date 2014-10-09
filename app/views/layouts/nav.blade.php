<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            {{ HTML::link('/', 'Kabumbu Football League', array('class' => 'navbar-brand')) }}
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li>{{ HTML::link('/', 'Home') }}</li>
                @if (Auth::check())
                <li>{{ HTML::link('teams', 'Teams') }}</li>
                <li>{{ HTML::link('players', 'Players') }}</li>
                <li>{{ HTML::link('games', 'Games') }}</li>
                <li>{{ HTML::link('/', 'League Table') }}</li>
                <li>{{ HTML::link('games/create', 'New Fixture') }}</li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(!Auth::check())
                <li>{{ HTML::link('users/register', 'Register') }}</li>
                <li>{{ HTML::link('users/login', 'Login') }}</li>
                @else
                <li>{{ HTML::link('users/logout', 'Logout') }}</li>
                @endif
            </ul>
        </div>
    </div>
</div>