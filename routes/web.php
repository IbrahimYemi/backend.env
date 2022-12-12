<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
$nmsp = 'App\Http\Controllers\PagesController';

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

// authentication route
Auth::routes();

// route for pages controller
Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', $nmsp.'@index');
Route::get('/about', $nmsp.'@about');
Route::get('/services', $nmsp.'@services');

// route for post controller
Route::resource('posts','App\Http\Controllers\PostsController');
// Route::resource('posts.create','App\Http\Controllers\PostsController@create')->middleware('auth');
// Route::resource('posts.edit','App\Http\Controllers\PostsController@update')->middleware('auth');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
