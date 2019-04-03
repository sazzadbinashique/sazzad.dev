@extends('layouts.blog-home')


@section('content')


        {{--<h1 class="page-header">--}}
            {{--Page Heading--}}
            {{--<small>Secondary Text</small>--}}
        {{--</h1>--}}

        <!-- First Blog Post -->
        @if(count($posts)>0)
            @foreach($posts as $post)
        <h2>
            <a href="{{route('home.post', $post->id)}}">{{$post->title}}</a>
        </h2>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>
            </div>
            <div class="col-sm-6 ">
                <!-- Date/Time -->
                <p style="text-align: right;"><span class="glyphicon glyphicon-time "></span> Posted On {{$post->created_at? $post->created_at->toDayDateTimeString(\Carbon\Carbon::now() ): ''}}</p>
            </div>
        </div>
        <hr>
        <img class="img-responsive" src="{{$post->photo->file or 'null'}}" alt="">
        <hr>
        <p>{{$post->body}}</p>
        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>
        @endforeach
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
        @else
        <h2>No Post Found</h2>

    @endif


@stop