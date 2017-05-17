<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Post as Post;
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
        $this->authorizeResource(Post::class);


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('home')->with(compact('posts'));
    }


    public function update($id)
    {
        $post = Post::find($id);
        return view('update')->with(compact('post'));
    }

}
