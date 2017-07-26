<?php

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
use App\Post;
use App\PostThread;
use App\PostReply;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forum', 'ForumController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Route::post('/newpost', 'ForumController@npost');
