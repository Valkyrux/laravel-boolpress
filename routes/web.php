<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return view('guests.welcome');
})->name('guest .index');

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(
        function () {
            Route::get('/', 'HomeController@index')->name('home');
            Route::get('/my_posts', 'PostController@myPostIndex')->name('my_posts.index');
            Route::get('/categories', 'CategoryController@index')->name('categories.index');
            Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
            Route::get('/profiles', 'UserController@index')->name('users.index');
            Route::resource('/posts', 'PostController');
        }
    );
