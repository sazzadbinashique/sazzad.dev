@extends('layouts.admin')


@section('content')

    <h1>Create Category</h1>

    <div class="col-sm-6">

        {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update', $category->id]]) !!}

        <div class="form-group{{$errors->has('name')? 'has-error': ''}}">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
            @if($errors->has('name'))
                <span class="text-danger"><em>{{$errors->first('name')}}</em></span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection