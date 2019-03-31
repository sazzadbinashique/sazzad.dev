<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\CreatePostRequest;
    use App\Role;
    use App\User;
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
            $users = User::pluck('name', 'id');

            $roles = Role::pluck('name', 'id');

            return view('posts.create', compact('users', 'roles'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(CreatePostRequest $request)
        {


            $input= $request->all();
//            dd($input);

            if ($file=$request->file('path')){

                $name = $file->getClientOriginalName();
                $file->move('images', $name);
                $input['path']= $name;
            }

//            dd($input);
            Post::create($input);



//           $file= $request->file('file');
//
//            echo  "<br>";
//
//
//            echo $file->getClientOriginalName();
//            echo "<br>";
//
//            echo  $file->getClientSize();

//            echo $file->path();

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
//             $user_id= 1;
//             $is_admin= 1;
//
//            $posts= new Post;
//
//            $posts->user_id  = $user_id;
//            $posts->title  = $request->title;
//            $posts->content =$request->content ;
//            $posts->is_admin =$is_admin;
//
////            dd($posts);
//            $posts->save();
//
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
        public function edit($id )
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


            $post = Post::findOrFail($id);

            $input = $request->all();
//            dd($input);

            if ($file=$request->file('path')){
                $name = $file->getClientOriginalName();
                $file->move('images', $name);
                $input['path']= $name;
            }

            $post->update($input);

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
