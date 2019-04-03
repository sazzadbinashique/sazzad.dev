<?php

namespace App\Http\Controllers;

use App\AdminPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


//        $request->session()->put(['Sazzad'=>'Web Application learner']);
//        session(['Shamima'=>'My little sister']);
//        $request->session()->forget('Shamima');
//        $request->session()->flush();
//        return session('Shamima');
//        return $request->session()->all();


//        $request->session()->flash('message', 'Post has been Created');

//        return $request->session()->get('message');

//        $request->session()->reflash();
//        $request->session()->keep('message');


        return view('home');
    }



    public  function blog(){

        $posts = AdminPost::all();

//        dd($posts);


        return view('blog', compact('posts'));
    }
}
