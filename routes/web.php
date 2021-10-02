<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

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

// Route::get('/', function () {

//     // $currentRoute = Route::current()->uri();

//     // // $currentRoute = Route::currentRouteName();
//     // $currentRoute = Route::getCurrentRoute();

//     // dd($currentRoute);

//     return view('welcome');
// })->name('home');

// Route::get('/', [HomeController::class, 'index'] );
Route::get('/', 'HomeController@index');

Route::get('frontend/posts/show', function () {
    return view('frontend.posts.show');
});


Route::get('backend/users/delete','Backend\UserController@delete')->name('backend.users.delete');
Route::get('backend/users/restore/{id}','Backend\UserController@restore')->name('backend.users.restore');

Route::get('backend/categories/delete','Backend\CategoryController@delete')->name('backend.categories.delete');
Route::get('backend/categories/restore/{id}','Backend\CategoryController@restore')->name('backend.categories.restore');

Route::prefix('backend')
->name('backend.')
->namespace('Backend')
->middleware([])
->group(function () {

    // Posts
    Route::resource('posts', PostController::class);
    // Dashboard
    Route::resource('/dashboard', DashboardController::class);
    // User
    Route::resource('users', UserController::class);
    //---- Quản lý danh mục Blog ----
    Route::resource('categories', CategoryController::class);
    //Tag
    Route::resource('tags', TagController::class);
});
