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

Route::get('/', function () {

    // $currentRoute = Route::current()->uri();

    // // $currentRoute = Route::currentRouteName();
    // $currentRoute = Route::getCurrentRoute();

    // dd($currentRoute);

    return view('welcome');
})->name('home');

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
    Route::resource('posts', PostController::class)->only([
        'index', 'store', 'create', 'edit', 'update'
    ])->names([
        'create' => 'posts.add'
    ])->parameters([
        'posts' => 'posts_id'
    ]);


    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');

    Route::prefix('users')->group(function () {
        Route::get('', function () {
            return view("backend.users.index");
        })->name('users.index');

        Route::get('/{id?}', function ($id) {
            return "Backend List User " . $id;
        })->whereNumber('id');

        Route::get('create', function () {
            return view("backend.users.create");
        })->name('users.create');

        Route::post('/store', function () {
            return "Backend User Store";
        });

        Route::view('/edit', 'backend.users.edit')->name('users.edit');

        Route::put('/update', function () {
            return "Backend User Update";
        });
    });

    //----- quản lý Blog -----
    Route::prefix('blogs')->name('blogs')->group(function () {
        Route::get('/', function () {
            return view('blogs');
        })->name('');

        Route::get('/add', function () {
            return view('addblogs');
        })->name('add');

        Route::get('/save', function () {
            return view('blogs');
        })->name('save');

        Route::get('/edit', function () {
            return view('editblogs');
        })->name('edit');

        Route::get('/update', function () {
            return view('blogs');
        })->name('update');

        Route::get('/delete', function () {
            return view('deleteblogs');
        })->name('delete');

        Route::get('/detail', function () {
            return view('detailblog');
        })->name('detail');

        //---- Quản lý danh mục Blog ----

        Route::prefix('cate')->name('.cate')->group(function () {
            Route::get('/', function () {
                return view('cateblog');
            })->name('');

            Route::get('/add', function () {
                return view('addcateblogs');
            })->name('add');

            Route::get('/save', function () {
                return view('cateblog');
            })->name('save');

            Route::get('/cate/edit', function () {
                return view('editcateblog');
            })->name('edit');

            Route::get('/update', function () {
                return view('cateblog');
            })->name('update');

            Route::get('/delete', function () {
                return view('deletecateblog');
            })->name('delete');

            Route::get('/detail', function () {
                return view('detailcateblog');
            })->name('detail');
        });
    });
});
