<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/content/{post_id}', 'ContentController@content');
Route::post('/content','ContentController@addLike');

Route::get('/entry','EntryController@index');
Route::post('/entry','EntryController@entry');

Route::get('/story/{cid}','StoryController@content');
Route::get('/mypage','MypageController@index');

//ログインボタンからのリンク
Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'facebook|twitter');
//コールバック用
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'facebook|twitter');