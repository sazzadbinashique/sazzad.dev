@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="col-md-6">

            <form action="/posts/{{$post->id}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="" cols="30" rows="10">{{$post->content}}</textarea>
                </div>

                <div class="form-group text-left">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>

            </form>

            <form action="/posts/{{$post->id}}" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="DELETE">

                <div class="form-group text-right">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>

            </form>




        </div>
    </div>



@stop