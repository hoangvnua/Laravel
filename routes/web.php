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

Route::prefix('backend')->name('backend')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('.dashboard.index');

    Route::prefix('/users')->group(function () {
        Route::get('/', function () {
            return "Backend List User ";
        })->name('.users.index');

        Route::get('/{id?}', function ($id) {
            return "Backend List User " . $id;
        })->whereNumber('id');

        Route::get('/create', function () {
            return view('create');
        });

        Route::post('/store', function () {
            return "Backend User Store";
        });

        Route::view('/edit', 'edit');

        Route::put('/update', function () {
            return "Backend User Update";
        });
    });

    //----- quản lý Blog -----
    Route::prefix('blogs')->name('.blogs')->group(function () {
        Route::get('/', function () {
            return view('blogs');
        })->name('');

        Route::get('/add', function () {
            return view('addblogs');
        })->name('.add');

        Route::get('/save', function () {
            return view('blogs');
        })->name('.save');

        Route::get('/edit', function () {
            return view('editblogs');
        })->name('.edit');

        Route::get('/update', function () {
            return view('blogs');
        })->name('.update');

        Route::get('/delete', function () {
            return view('deleteblogs');
        })->name('.delete');

        Route::get('/detail', function () {
            return view('detailblog');
        })->name('.detail');

        //---- Quản lý danh mục Blog ----

        Route::prefix('cate')->name('.cate')->group(function () {
            Route::get('/', function () {
                return view('cateblog');
            })->name('');

            Route::get('/add', function () {
                return view('addcateblogs');
            })->name('.add');

            Route::get('/save', function () {
                return view('cateblog');
            })->name('.save');

            Route::get('/cate/edit', function () {
                return view('editcateblog');
            })->name('.edit');

            Route::get('/update', function () {
                return view('cateblog');
            })->name('.update');

            Route::get('/delete', function () {
                return view('deletecateblog');
            })->name('.delete');

            Route::get('/detail', function () {
                return view('detailcateblog');
            })->name('.detail');
        });
    });
});
