@extends('layouts.blog-home')


@section('content')
    <!-- Blog Post -->
    <!-- Title -->
    <h1>{{$post->title}}</h1>
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
    <!-- Preview Image -->
    {{--http://placehold.it/900x300--}}
    <img class="img-responsive" src="{{$post->photo->file or ''}}" alt="">


    <hr>
    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

    <hr>
    <!-- Blog Comments -->
    <!-- Comments Form -->

    @if(Auth::check())
    <div class="well">

        @if(Session::has('created_comment'))
            <p class="alert alert-success">{{session('created_comment')}}</p>

        @endif

        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store','files'=>true]) !!}

        <input type="hidden" name="admin_post_id" value="{{$post->id}}">
        <div class="form-group">
            {!! Form::label('body', 'Name:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Comment', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
    @endif

    <hr>
    <!-- Posted Comments -->
    <!-- Comment -->

    @if(count($comments)>0)

        @foreach($comments as $comment)
    <div class="media">
        <a class="pull-left" href="#">
            {{--<img class="media-object" src="http://placehold.it/64x64" alt="">--}}
            <img class="media-object" height="64px" src="{{$comment->photo->file or 'no image'}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at? $comment->created_at->toDayDateTimeString(\Carbon\Carbon::now() ): ''}}</small>
            </h4>
            <p>{{$comment->body}}</p>
        </div>
    </div>
        @endforeach

    @endif

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div>


@endsection