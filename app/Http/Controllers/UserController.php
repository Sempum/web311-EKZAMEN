<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.admin.users.index', [
            'users' => User::all()->sortBy('name')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.users.create', [
            'roles' => Role::all()->sortBy('name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('layouts.admin.users.edit', [
            'user' => $user,
            'roles' => Role::all(),
            'permissions' => ModelsPermission::all(),
            'adminRole' => Role::where('name', 'admin')->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'min:4', 'max:255', 'unique:users,name,' . $user->id],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
        ]);


        $user->update($request->all());
        $user->syncRoles($request->input('roles'));
        $user->syncPermissions($request->input('permissions'));

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    /**
     * Ban users
     */

    public function ban(User $user, Request $request)
    {
        $user->banned_till = 0;
        $user->update($request->all());

        return back();
    }

    /**
     * Unban users
     */
    public function unban(User $user, Request $request)
    {
        $user->banned_till = null;
        $user->update($request->all());

        return back();
    }
}
