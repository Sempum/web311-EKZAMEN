<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.admin.roles.index', [
            'roles' => Role::all()->sortBy('name')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('layouts.admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()->sortBy('name')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id
        ]);

        $role->update($request->all());
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
