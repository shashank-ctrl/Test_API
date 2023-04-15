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
Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/', function () {
//     return view('home');
// });

//Posts Controller 
Route::get('/posts', array('as'=> 'admin.posts.index', 'uses' => 'App\Http\Controllers\PostController@index'));
Route::get('/posts/create', array('as'=> 'admin.posts.create', 'uses' => 'App\Http\Controllers\PostController@create'));
Route::post('/posts/store', array('as'=> 'admin.posts.store', 'uses' => 'App\Http\Controllers\PostController@store'));
Route::get('/posts/show/{id}', array('as'=> 'admin.posts.show', 'uses' => 'App\Http\Controllers\PostController@show'));
Route::get('/posts/edit/{id}', array('as'=> 'admin.posts.edit', 'uses' => 'App\Http\Controllers\PostController@edit'));
Route::put('/posts/update/{id}', array('as'=> 'admin.posts.update', 'uses' => 'App\Http\Controllers\PostController@update'));
Route::delete('/posts/destroy/{id}', array('as'=> 'admin.posts.destroy', 'uses' => 'App\Http\Controllers\PostController@destroy'));



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
