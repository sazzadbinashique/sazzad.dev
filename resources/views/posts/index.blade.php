@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-md-offset-2">

        <div class="text-right">
            <a href="{{route('posts.create')}}" class="btn btn-primary " type="button">Add Post</a>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>User</th>
                <th>Image</th>
                <th>Content</th>
                <th>Edit</th>
                <th>Show</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->user->name}}</td>
                    <td><img width="100" src="{{$post->path}}" alt=""></td>
                    <td>{{$post->content}}</td>
                    <td><a class="btn btn-primary" href="{{route('posts.edit', $post->id)}}">Edit</a></td>
                    <td><a class="btn btn-success" href="{{route('posts.show',$post->id)}}">show</a></td>
                    <td>
                        <form action="/posts/{{$post->id}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>



@stop