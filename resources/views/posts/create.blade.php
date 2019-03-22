@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="col-md-6">

        <form action="/posts" method="post">
            {{ csrf_field() }}
            <div class="form-group  {{ $errors->has('title') ? 'has-error' : ''}}">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
                {!! $errors->first('content', '<p class="help-block">:message</p>') !!}

            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">


            </div>
        </form>
        </div>
    </div>


    {{--@if(count($errors)>0)--}}
        {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
            {{--@foreach($errors->all() as $error)--}}
                {{--<li>{{$error}}</li>--}}
            {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}

@stop