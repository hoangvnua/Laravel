<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

        $users = User::Paginate(5);
        $name = $request->get('name');
        $email = $request->get('email');

        if (!empty($name)) {
            $users = User::where('name', 'like', "%" . $name . "%")->Paginate(5);
        }

        if (!empty($email)) {
            $users = User::where('email', 'like', '%' . $email . '%')->Paginate(5);
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
        $roles = Role::get();
        return view('backend.users.create')->with(['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'avatar' => 'required|file|mimes:jpg,png|max:3072|min:20'
        ]);
        $data = $request->only(['name', 'email', 'password', 'phone', 'address', 'avatar']);
        $roles = $request->get('roles');

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->status = 1;
        if ($request->hasFile('avatar')) {
            $disk = 'public';
            $path = $request->file('avatar')->store('avatars', $disk);
            // $path = Storage::putFile('avatar', $request->file('public'));
            $user->disk = $disk;
            $user->avatar = $path;
        }
        $user->save();

        DB::table('user_infos')->insert([
            'user_id' => $user->id,
            'address' => $data['address'],
            'phone' => $data['phone']
        ]);
        // $userInfo = new UserInfo();
        // $userInfo->user_id = $user->id;
        // $userInfo->address = $data['address'];
        // $userInfo->phone = 123456;
        // $userInfo->save();

        $user->roles()->attach($roles);

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
        $user = User::find($id);
        $roles = Role::get();

        return view('backend.users.edit')->with([
            'user' => $user,
            'roles' => $roles
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
        $data = $request->only(['name', 'email', 'password', 'address', 'phone']);
        $roles = $request->get('roles');

        // DB::table('users')->where('id', $id)->update([
        //     'name' => $data['name'],
        //     'email' => $data['email']
        // ]);

        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();

        DB::table('user_infos')->where('user_id', $id)->update([
            'address' => $data['address'],
            'phone' => $data['phone']
        ]);

        $user->roles()->sync($roles);

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
