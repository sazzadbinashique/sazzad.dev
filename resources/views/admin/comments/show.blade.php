@extends('layouts.admin')



@section('content')

    <h1>{{ucfirst(Auth::user()->name)}}'s Comment</h1>

    @if(Session::has('updated_comment'))
        <p class="alert alert-success">{{session('updated_comment')}}</p>
    @endif
    @if(Session::has('deleted_comment'))
        <p class="alert alert-danger">{{session('deleted_comment')}}</p>
    @endif

    <table class="table table-bordered">
        <thead>
        @if(count($comments) > 0)
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Body</th>
                <th>Status</th>
                <th>Post view</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->body}}</td>
                <td>{{$comment->is_active}}</td>
                <td><a href="{{route('home.post',$comment->admin_post->id)}}">{{$comment->admin_post->id}}</a></td>
                <td>{{$comment->created_at->diffForHumans(\Carbon\Carbon::now())}}</td>
                <td>{{$comment->updated_at->diffForHumans(\Carbon\Carbon::now())}}</td>
                <td>
                    @if($comment->is_active == 1)
                        {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}

                        <input type="hidden" name="is_active" value="0">

                        <div class="form-group">
                            {!! Form::submit('UnApproved', ['class'=>'btn btn-success']) !!}
                        </div>

                        {!! Form::close() !!}

                    @else
                        {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                        <input type="hidden" name="is_active" value="1">

                        <div class="form-group">
                            {!! Form::submit('Approved', ['class'=>'btn btn-info']) !!}
                        </div>

                        {!! Form::close() !!}

                    @endif

                </td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['PostCommentsController@destroy', $comment->id]]) !!}

                    <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    </div>

                    {!! Form::close() !!}


                </td>
            </tr>
        @endforeach
        @else
            <h2 class="text-center">NO Comment</h2>
        @endif
        </tbody>
    </table>

@endsection