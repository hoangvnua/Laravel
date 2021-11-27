<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', 'HomeController@index')->name('frontend.index');

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

        // order
        Route::resource('orders', OrderController::class);

        Route::resource('storages', StorageController::class)->parameters(['storages' => 'id']);

        // Posts
        Route::resource('posts', PostController::class);

        // Dashboard
        Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
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
        //Product
        Route::resource('products', ProductController::class);
    });

Route::prefix('/')->name('frontend.')->namespace('Frontend')->group(function () {

    Route::get('posts/list', 'PostController@list')->name('posts.list');

    Route::get('shop/list', 'ShopController@list')->name('shop.list');
    Route::get('shop', 'ShopController@index')->name('shop.index');
    Route::get('shop/{id}', 'ShopController@show')->name('shop.show');

    Route::get('cart', 'CartController@index')->name('cart');
    Route::get('cart/create/{id}', 'CartController@create')->name('cart.create');
    Route::get('cart/remove/{rowId}', 'CartController@remove')->name('cart.remove');
    Route::get('cart/increase/{rowId}', 'CartController@increase')->name('cart.increase');
    Route::get('cart/decrease/{rowId}', 'CartController@decrease')->name('cart.decrease');


    Route::resource('posts', PostController::class);

    Route::resource('pay', PayController::class);
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
