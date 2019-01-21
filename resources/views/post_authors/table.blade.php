<table class="table table-responsive" id="postAuthors-table">
    <thead>
        <tr>
            <th>Author Id</th>
        <th>Post Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($postAuthors as $postAuthor)
        <tr>
            <td>{!! $postAuthor->author_id !!}</td>
            <td>{!! $postAuthor->post_id !!}</td>
            <td>
                {!! Form::open(['route' => ['postAuthors.destroy', $postAuthor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('postAuthors.show', [$postAuthor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('postAuthors.edit', [$postAuthor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>