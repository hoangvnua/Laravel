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
    return view('welcome');
})->name('home');

Route::get('backend/dashboard', function () {
    return view('dashboard');
})->name('backend.dashboard.index');

Route::get('backend/users', function () {
    return "Backend List User ";
})->name('backend.users.index');

Route::get('backend/users/{id?}', function ($id) {
    return "Backend List User " . $id;
})->whereNumber('id');

Route::get('backend/users/create', function () {
    return view('create');
});

Route::post('backend/users/store', function () {
    return "Backend User Store";
});

Route::view('backend/users/edit', 'edit');

Route::put('backend/users/update', function () {
    return "Backend User Update";
});
//----- quản lý Blog -----

Route::get('backend/blogs', function () {
    return view('blogs');
})->name('backend.blogs');

Route::get('backend/blogs/add', function () {
    return view('addblogs');
})->name('backend.blogs.add');

Route::get('backend/blogs/save', function () {
    return view('blogs');
})->name('backend.blogs.save');

Route::get('backend/blogs/edit', function () {
    return view('editblogs');
})->name('backend.blogs.edit');

Route::get('backend/blogs/update', function () {
    return view('blogs');
})->name('backend.blogs.update');

Route::get('backend/blogs/delete', function () {
    return view('deleteblogs');
})->name('backend.blogs.delete');

Route::get('backend/blogs/detail', function () {
    return view('detailblog');
})->name('backend.blogs.detail');

//---- Quản lý danh mục Blog ----

Route::get('backend/blogs/cate', function () {
    return view('cateblog');
})->name('backend.blogs.cate');

Route::get('backend/blogs/cate/add', function () {
    return view('addcateblogs');
})->name('backend.blogs.cate.add');

Route::get('backend/blogs/cate/save', function () {
    return view('cateblog');
})->name('backend.blogs.cate.save');

Route::get('backend/blogs/cate/edit', function () {
    return view('editcateblog');
})->name('backend.blogs.cate.edit');

Route::get('backend/blogs/cate/update', function () {
    return view('cateblog');
})->name('backend.blogs.cate.update');

Route::get('backend/blogs/cate/delete', function () {
    return view('deletecateblog');
})->name('backend.blogs.cate.delete');

Route::get('backend/blogs/cate/detail', function () {
    return view('detailcateblog');
})->name('backend.blogs.cate.detail');
