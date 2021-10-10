<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Nullable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $users = DB::table('users')->paginate(5);
        // $users = DB::table('users')->simplePaginate(5);

        $users = User::simplePaginate(5);
        $name = $request->get('name');
        $email = $request->get('email');

        if (!empty($name)) {
            $users = User::where('name', 'like', "%" . $name . "%")->simplePaginate(5);
        }

        if (!empty($email)) {
            $users = User::where('email', 'like', '%' . $email . '%')->simplePaginate(5);
        }

        return view('backend.users.index')->with([
            'users' => $users
        ]);
    }

    public function restore($id)
    {
        $users = User::withTrashed()->where('id', $id)->restore();

        return redirect()->route('backend.users.delete');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'password', 'address']);


        try {
            $user_id = DB::table('users')->insertGetId([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'status' => 1,
            ]);

            DB::table('user_infos')->insert([
                'user_id' => $user_id,
                'address' => $data['address'],
                'phone' => '123456'
            ]);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }


        return redirect()->route('backend.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        // $userInfo = $user->UserInfo;
        // dd($userInfo->address);
        return view('backend.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->find($id);

        return view('backend.users.edit')->with([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'email']);

        DB::table('users')->where('id', $id)->update([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
        return redirect()->route('backend.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        // dd($user);
        if (!Gate::allows('delete-user', $user)) {
            abort(403);
        }
        // DB::table('users')->where('id', $id)->delete();
        User::destroy($id);

        return redirect()->route('backend.users.index');
    }

    public function delete(Request $request)
    {
        $users = User::onlyTrashed()->get();
        return view('backend.users.softDelete', [
            'users' => $users,
        ]);
    }

    public function loginWithUser($id)
    {
        Auth::loginUsingId($id);

        return redirect('backend/dashboard');
    }
}
