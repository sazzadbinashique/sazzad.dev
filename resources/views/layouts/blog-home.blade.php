<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/blog-post.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/metisMenu.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
@include('header')
<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-md-8">
            <!-- Blog Entries Column -->
            @yield('content')
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
        @include('search')
        <!-- Blog Categories Well -->

        @include('category')

        <!-- Side Widget Well -->
            <div class="well">
                <a href="https://github.com/sazzadbinashique/"><canvas id="myCanvas" width="300" height="250">
                        <!-- Insert fallback content here -->
                        Sorry, your browser doesn't support canvas technology
                    </canvas></a>
                {{--<h4>Side Widget Well</h4>--}}
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>--}}
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->

    @include('footer')

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/metisMenu.js')}}"></script>
<script src="{{asset('assets/js/sb-admin-2.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>

</body>

</html>