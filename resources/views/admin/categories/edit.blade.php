@extends('layouts.admin')


@section('content')

    <h1>Create Category</h1>

    <div class="col-sm-6">

        {!! Form::model($category, ['method'=>'POST', 'action'=> ['AdminCategoriesController@update', $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection