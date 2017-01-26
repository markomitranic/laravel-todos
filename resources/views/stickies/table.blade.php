<table class="table table-responsive" id="stickies-table">
    <thead>
        <th>Body</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($stickies as $stickies)
        <tr>
            <td>{!! $stickies->body !!}</td>
            <td>
                {!! Form::open(['route' => ['stickies.destroy', $stickies->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('stickies.show', [$stickies->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('stickies.edit', [$stickies->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>