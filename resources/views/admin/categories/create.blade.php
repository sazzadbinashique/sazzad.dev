@extends('layouts.admin')


@section('content')

    <h1>Create Category</h1>

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoriesController@store']) !!}

        <div class="form-group{{$errors->has('name')? 'has-error': ''}}">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
            @if($errors->has('name'))
                <span class="text-danger"><em>{{$errors->first('name')}}</em></span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection