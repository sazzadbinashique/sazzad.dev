<?php

namespace App\Http\Controllers;

use App\AdminPost;
use App\Photo;
use App\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = PostComment::all();

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
//        dd($user);
        $data = [
          'admin_post_id' => $request->admin_post_id,
          'photo_id' =>$user->photo_id,
            'author'=>$user->name,
            'email' =>$user->email,
            'body' => $request->body
        ];

//        dd($data);
        PostComment::create($data);

        Session::flash('created_comment', 'The Comment has been created Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = AdminPost::findOrFail($id);


        $comments = $post->post_comment;
//        dd($comments);

        return view('admin.comments.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        PostComment::findOrFail($id)->update($request->all());

        Session::flash('updated_comment', 'The comment has been updated successfully');
        return redirect('admin/comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostComment::findOrFail($id)->delete();

        Session::flash('deleted_comment', 'The comment has been Deleted successfully');

        return redirect('admin/comments');
    }
}
