<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;
use Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    //ログインボタンからリンク
    public function socialLogin($social)
    {
        Log::info('fadfaaa');

        return Socialite::driver($social)->redirect();
    }

    //Callback処理
    public function handleProviderCallback($social)
    {
        Log::info('fffffffffadfaaa');

        //ソーシャルサービス（情報）を取得
        //$userSocial = Socialite::driver($social)->userFromTokenAndSecret(env('TWITTER_ACCESS_TOKEN'), env('TWITTER_ACCESS_TOKEN_SECRET'));
     
        try {
            Log::info("kakakaka");
            $userSocial = Socialite::with($social)->user();
            Log::info("kikikis");

        } catch(\Exception $e) {
            Log::info("nannnann");
            return redirect('/login')->with('oauth_error', '予期せぬエラーが発生しました');
        }

        Log::info($userSocial->getName());

        //emailで登録を調べる
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        //登録（email）の有無で分岐
        if($user){
            
            //登録あればそのままログイン（2回目以降）
            Auth::login($user);
            return redirect('/');

        }else{

            //なければ登録（初回）
            $newuser = new User;

            $newuser->name = $userSocial->getName();
            $newuser->email = $userSocial->getEmail();
            $newuser->save();

            //そのままログイン
            Auth::login($newuser);
            return redirect('/');

        }
    }
    
}
