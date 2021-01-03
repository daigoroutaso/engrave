<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Log;
use Carbon\Carbon;
use App\Library\Common;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //最新の投稿を取得する
        $posts = Post::orderBy('created_at','desc')->take(12)->get();

        return view('home',compact('posts'));

    }
}
