@extends('layouts.admin')

@section('content')

    <h1>users </h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
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
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name or ''}}</td>
                    <td>{{$user->is_active == 1 ? 'Active': 'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans(Carbon\Carbon::now())}}</td>
                    <td>{{$user->updated_at->diffForHumans(\Carbon\Carbon::now())}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection
