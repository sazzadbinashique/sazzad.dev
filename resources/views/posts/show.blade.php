@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="col-md-12">

            <form action="" method="post">
                {{ csrf_field() }}

                <div class="row">

                    <div class="col-md-12">



                    <h4 class="text-center"><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></h4>
                    <p class="text-center"><a href="{{route('posts.edit',$post->id)}}">{{$post->content}}</a></p>

                    </div>

                </div>



                {{--<div class="form-group">--}}
                    {{--<label for="title">Title</label>--}}
                    {{--<input type="text" name="title" class="form-control" value="{{$post->title}}">--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<label for="content">Content</label>--}}
                    {{--<textarea class="form-control" name="content" id="" cols="30" rows="10">{{$post->content}}</textarea>--}}
                {{--</div>--}}



            </form>

        </div>
    </div>



@stop