<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Abraham\TwitterOAuth\TwitterOAuth;

use App\User;
use App\Post;
use Log;
use File;

class EntryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        return view('entry');
    }

    //
    public function entry(Request $request)
    {
        //
        // postで送られてくる想定
        // 入力テキスト
        // 画像（base64)
        //  
        // Auth::user->
        //
        Log::Debug($request->text);
        Log::Debug($request->img);

        $text = $request->text;

        $post_id = Str::random(32);
        Log::Debug($post_id);

        //画像をストレージに保存
        $image = $request->img;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = $post_id.'.'.'png';
        File::put(storage_path(). '/app/public/upload/' . $imageName, base64_decode($image));

        //postsレコード挿入
        $newpost= new Post;
        $newpost->user_id = Auth::user()->email;
        $newpost->post_id = $post_id;
        $newpost->like_cnt = 0;
        $newpost->text = $text;
        $newpost->save();

        //ツイッターに投稿
//        $twitter = new TwitterOAuth(env('TWITTER_CLIENT_ID'),
//        env('TWITTER_CLIENT_SECRET'),
//        env('TWITTER_ACCESS_TOKEN'),
//        env('TWITTER_ACCESS_TOKEN_SECRET'));

//        $twitter->post("statuses/update", ["status" => "twitter api test!"]);

        return $post_id;
    }
}
