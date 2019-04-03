@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))
        <p class="alert alert-danger">{{session('deleted_user')}}</p>
    @endif

    @if(Session::has('updated_user'))
        <p class="alert alert-success">{{session('updated_user')}}</p>
    @endif

    @if(Session::has('created_user'))
        <p class="alert alert-info">{{session('created_user')}}</p>
    @endif

    <h1>All users </h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>FullName</th>
            <th>usersname</th>
            <th>Photos</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
{{--                    <td>{{$user->first_name . ' ' . $user->last_name}}</td>--}}
                    <td>{{$user->fullname()}}</td>
                    <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td><img height="60px" src="{{$user->photo? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name or ''}}</td>
                    <td>{{$user->is_active == 1 ? 'Active': 'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans(Carbon\Carbon::now())}}</td>
                    <td>{{$user->updated_at->diffForHumans(\Carbon\Carbon::now())}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection
