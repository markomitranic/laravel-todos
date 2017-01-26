<table class="table table-responsive" id="todos-table">
    <thead>
        <th>Title</th>
        <th>Description</th>
        <th>Alert</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($todos as $todos)
        <tr>
            <td>{!! $todos->title !!}</td>
            <td>{!! $todos->description !!}</td>
            <td>{!! $todos->alert !!}</td>
            <td>
                {!! Form::open(['route' => ['todos.destroy', $todos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('todos.show', [$todos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('todos.edit', [$todos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>