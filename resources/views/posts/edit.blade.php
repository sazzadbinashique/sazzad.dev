@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="col-md-3">

            <img height="100" src="{{$post->path}}" alt="">

        </div>

        <div class="col-md-9">
            {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['PostController@update', $post->id],'files'=>true]) !!}
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{$post->title}}">
            </div>

            <div class="form-group ">
                <input type="file" name="path" class="form-control">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10">{{$post->content}}</textarea>
            </div>
            <div class="form-group text-left">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    @if(count($errors)>0)

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach

            </ul>
        </div>

    @endif



@stop