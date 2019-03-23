@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!

                    <div class="well">
                        <ul>
                            <ol><a href="{{url('/posts')}}">All Posts</a></ol>
                            <ol><a href="{{url('/posts/create')}}">Add Posts</a></ol>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
