@extends('layouts.admin')

@section('content')

    <h1>Admin Posts Create</h1>

    <div class="col-md-3">
        <img src="{{$post->photo? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">

    </div>

    <div class="col-md-9">



        {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostsController@update', $post->id],'files'=>true]) !!}

        <div class="form-group{{$errors->has('tile')? 'has-error': ''}}">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
            @if($errors->has('title'))
                <span class="text-danger"><em>{{$errors->first('title')}}</em></span>
            @endif
        </div>

        <div class="form-group{{$errors->has('body')? 'has-error': ''}}}">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
            @if($errors->has('body'))
                <span class="text-danger"><em>{{$errors->first('body')}}</em></span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('user_id', 'UserName:') !!}
            {!! Form::select('user_id', $users, array(''=> 'Choose Option'),  ['class'=> 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'CategoryName:') !!}
            {!! Form::select('category_id', $categories, array(''=> 'Choose Option'), ['class'=> 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


@endsection
