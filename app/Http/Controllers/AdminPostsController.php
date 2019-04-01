<?php

namespace App\Http\Controllers;

use App\AdminPost;
use App\Category;
use App\Http\Requests\AdminPostRequest;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = AdminPost::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::pluck('name', 'id');
        $categories= Category::pluck('name', 'id');

        return view('admin.posts.create', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPostRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        if ($file= $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']= $photo->id;
        }
//        AdminPost::create($input);
        $user->posts()->create($input);

        Session::flash('created_post', 'The Post has been Created successfull');

        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = AdminPost::findOrFail($id);
//        $users = User::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');

        return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminPostRequest $request, $id)
    {
//        $post = AdminPost::findOrFail($id);
        $input = $request->all();
        $user = Auth::user();

        if ($file= $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']= $photo->id;
        }

       $user->posts()->findOrFail($id)->update($input);

        Session::flash('updated_post', 'The Post has been Updated Successfull');

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = AdminPost::findOrFail($id);
        unlink(public_path() . $post->photo->file);
        $post->delete();
        Session::flash('deleted_post', 'The Post has been deleted successfull');

        return redirect('admin/posts');
    }
}
