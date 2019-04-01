@extends('layouts.admin')





@section('content')

    <h1>All Categories</h1>

    @if('created_categories')
        <p class="alert alert-success">{{session('created_categories')}}</p>
    @endif


    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($categories)
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at? $category->created_at->diffForHumans(\Carbon\Carbon::now()): 'doesn\'t exits' }}</td>
                    <td>{{$category->updated_at? $category->updated_at->diffForHumans(\Carbon\Carbon::now()): 'doesn\'t exits'}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection