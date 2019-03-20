@extends('layouts.app')

@section('content')


	<div class="col-md-9 col-md-offset-2">
        <div class="table-responsive">
            <table class="table  ">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>



@stop