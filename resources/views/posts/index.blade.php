@extends('layouts.app')

@section('content')


	<div class="col-md-9 col-md-offset-2">


            <div class="text-right">

                <a href="{{route('posts.create')}}" class="btn btn-primary " type="button">Add Post</a>

            </div>



        <div class="table-responsive">
            <table class="table  ">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Content</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td><img width="100" src="{{$post->path}}" alt=""></td>
                        <td>{{$post->content}}</td>
{{--                        <td><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></td>--}}
{{--                        <td><a href="{{route('posts.show', $post->id)}}">{{$post->content}}</a></td>--}}
                        <td><a class="btn btn-primary" href="{{route('posts.edit', $post->id)}}">Edit</a></td>
                        <td><a class="btn btn-success" href="{{route('posts.show',$post->id)}}">show</a></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>



@stop