@extends('layouts.admin')

@section('content')

    <h1>All Admin Posts </h1>

    @if(Session::has('created_post'))
        <p class="alert alert-success">{{session('created_post')}}</p>
    @endif

    @if(Session::has('updated_post'))
        <p class="alert alert-success">{{session('updated_post')}}</p>
    @endif
    @if(Session::has('deleted_post'))
        <p class="alert alert-danger">{{session('deleted_post')}}</p>
    @endif


    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category->name or ''}}</td>
                    <td><img height="50px" src="{{$post->photo->file or ''}}" alt=""></td>
                    <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForHumans(Carbon\Carbon::now())}}</td>
                    <td>{{$post->updated_at->diffForHumans(Carbon\Carbon::now())}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection
