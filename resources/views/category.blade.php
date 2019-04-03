<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        @foreach($categories as $category)
            @if(count($category)>0)
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">{{$category->name}}</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            @elseif(count($category)>3)
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">{{$category->name}}</a>
                    </li>
                </ul>
            </div>
            @endif
        @endforeach
    <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>


