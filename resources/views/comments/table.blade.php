<table class="table table-responsive" id="comments-table">
    <thead>
        <tr>
            <th>Content</th>
        <th>Post Id</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td>{!! $comment->content !!}</td>
            <td>{!! $comment->post_id !!}</td>
            <td>{!! $comment->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('comments.show', [$comment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('comments.edit', [$comment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>