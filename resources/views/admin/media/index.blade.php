@extends('layouts.admin')



@section('content')

    <h1>All Photos</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photos</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
        </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50px" src="{{$photo->file or 'doesn\'t exits'}}" alt="not found"></td>
                    <td>{{$photo->created_at ? $photo->created_at->diffForHumans(\Carbon\Carbon::now()): 'doesn\'t exits'}}</td>
                    <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans(\Carbon\Carbon::now()): 'doesn\'t exits'}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminMediaController@destroy', $photo->id],'files'=>true]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete media', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection