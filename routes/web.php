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


Route::prefix('backend')
->name('backend.')
->namespace('Backend')
->middleware([])
->group(function () {

    // Posts
    Route::resource('posts', PostController::class)->names([
        'create' => 'posts.add'
    ])->parameters([
        'posts' => 'posts_id'
    ]);

    // Dashboard
    Route::resource('/dashboard', DashboardController::class);
    
    // User
    Route::resource('users', UserController::class);

    Route::resource('users', DeletedUserController::class);
    // Route::prefix('users')->group(function () {
    //     Route::get('', function () {
    //         return view("backend.users.index");
    //     })->name('users.index');

    //     Route::get('/{id?}', function ($id) {
    //         return "Backend List User " . $id;
    //     })->whereNumber('id');

    //     Route::get('create', function () {
    //         return view("backend.users.create");
    //     })->name('users.create');

    //     Route::post('/store', function () {
    //         return "Backend User Store";
    //     });

    //     Route::view('/edit', 'backend.users.edit')->name('users.edit');

    //     Route::put('/update', function () {
    //         return "Backend User Update";
    //     });
    // });

    //---- Quản lý danh mục Blog ----

    Route::resource('category', CategoryController::class);

});
