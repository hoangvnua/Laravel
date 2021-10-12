<?php

use App\Models\Permission;
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
    ->middleware(['auth'])
    ->group(function () {


        Route::post('/login/user/{id}', 'UserController@loginWithUser')
            ->name('users.login');

        Route::get('users/delete', 'UserController@delete')->name('users.delete');
        Route::get('users/restore/{id}', 'UserController@restore')->name('users.restore');

        Route::get('categories/delete', 'CategoryController@delete')->name('categories.delete');
        Route::get('categories/restore/{id}', 'CategoryController@restore')->name('categories.restore');


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
        // Permission
        Route::resource('permissions', PermissionController::class);
        //Role
        Route::resource('roles', RoleController::class);
    });

Route::prefix('frontend')->name('frontend.')->namespace('Frontend')->group(function () {
    Route::get('index', function () {
        return view('frontend.index');
    })->name('index');

    Route::get('posts/', function () {
        return view('frontend.posts.index');
    })->name('posts.index');

    Route::get('posts/danhmuc', function () {
        return view('frontend.posts.danhmuc');
    })->name('posts.danhmuc');

    Route::get('posts/detail', function () {
        return view('frontend.posts.detail');
    })->name('posts.detail');
});

Route::prefix('/')->namespace('Auth')->name('auth.')->group(function () {
    Route::get('login', 'LoginController@create')
        ->middleware('guest')
        ->name('login');

    Route::post('login', 'LoginController@authenticate')
        ->middleware('guest')
        ->name('login');

    Route::get('register', 'RegisteredController@create')
        ->middleware('guest')
        ->name('register');

    Route::post('register', 'RegisteredController@store')
        ->middleware('guest')
        ->name('register');

    Route::post('/logout', 'LoginController@logout')->name('logout');
});
