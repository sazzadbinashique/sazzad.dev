<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\CreatePostRequest;
    use Illuminate\Http\Request;
    use App\Post;

    class PostController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            // $posts = Post::all();
            // $posts = Post::orderBy('id', 'desc')->get();
            $posts = Post::all();
//
//
//            // dd($posts);
            return view('posts.index', compact('posts'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {

            return view('posts.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(CreatePostRequest $request)
        {


//            $this->validate($request, [
//
//                'title'=>'required',
//                'content'=>'required'
//            ]);


//            return $request->all();

//            Post::create($request->all());
//            $input=$request->all();
//
//            $input['title']=$request->all();
//
             $user_id= 1;
             $is_admin= 1;

            $posts= new Post;

            $posts->user_id  = $user_id;
            $posts->title  = $request->title;
            $posts->content =$request->content ;
            $posts->is_admin =$is_admin;

//            dd($posts);
            $posts->save();

            return redirect('/posts');

        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $post = Post::findOrFail($id);


            return view('posts.show', compact('post'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $post= Post::findOrFail($id);

            return view('posts.edit', compact('post'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(CreatePostRequest $request, $id)
        {

//            $this->validate($request, [
//
//                'title'=>'required',
//                'content'=>'required'
//            ]);



            $post = Post::findOrFail($id);

            $post->update($request->all());

//            dd($post);

            return redirect('/posts');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
//            $post= Post::whereId($id)->delete();
            $post= Post::findOrFail($id);

            $post->delete();


            return redirect('/posts');
        }
    }
