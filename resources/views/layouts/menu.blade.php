<li class="{{ Request::is('stickies*') ? 'active' : '' }}">
    <a href="{!! route('stickies.index') !!}"><i class="fa fa-edit"></i><span>stickies</span></a>
</li>

<li class="{{ Request::is('todos*') ? 'active' : '' }}">
    <a href="{!! route('todos.index') !!}"><i class="fa fa-edit"></i><span>todos</span></a>
</li>

