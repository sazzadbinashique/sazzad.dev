@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="col-md-6">

        <form action="/posts" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>

        </form>


        </div>
    </div>



@stop