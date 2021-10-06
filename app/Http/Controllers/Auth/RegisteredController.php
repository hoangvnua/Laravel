<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rules;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisteredController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1
        ]);

        DB::table('user_infos')->insert([
            'user_id' => $user->id,
            'address' => 'bắc ninh',
            'phone' => '123456'
        ]);
        // try {

        //     $user_id = DB::table('users')->insertGetId([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //         'status' => 1
        //     ]);

        //     
        // } catch (Exception $ex) {
        //     // dd($ex->getMessage());
        //     Log::error($ex->getMessage());
        // }
        Auth::login($user);
        return redirect('backend/dashboard');
    }
}
