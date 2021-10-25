<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        // Storage::makeDirectory('avatars');
        // Storage::makeDirectory('products');
        // Storage::makeDirectory('images');
        // return Storage::disk('public')->download('canhdep.jpg', 'test.png');
        // if (Storage::missing('file.txt')) {
        //     dd('Không');
        // } else {
        //     dd('Có');
        // }
        // // dd(storage_path('app'));
        // // $save = Storage::disk('local')->put('file.txt', 'Contents');

        // $contents = Storage::disk('public')->get('canhdep.jpg');

        // dd($contents);
        return view('backend.dashboard');
    }
}
