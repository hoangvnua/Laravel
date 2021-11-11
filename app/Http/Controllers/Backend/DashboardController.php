<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $cookie = cookie('username', 'hoangnv', 5);
        // return response('hello')->cookie($cookie);

        return view('backend.dashboard');
    }
}
