<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Log;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    //表示
    public function content($post_id)
    {
        //post情報、user情報参照
        $posts  = Post::where('post_id',$post_id)->get();
        $users  = User::where('email',$posts[0]->user_id)->get();

        return view('content',compact('posts','users')); 
    }

    //いいねボタン押下
    public function addLike(Request $request)
    {

        Post::where('post_id',$request->post_id)->increment('like_cnt');


        return 0;
    }
}
