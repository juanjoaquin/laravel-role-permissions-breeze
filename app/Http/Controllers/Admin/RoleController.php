<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        // $roles = Role::all();

        $roles = Role::whereNotIn('name', ['admin'])->get(); //Dont see admin

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:100', 'min:3']
        ]);

        Role::create($validated);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'))
            ->with('message', 'Role Creted Succesfully.');
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'max:100', 'min:3']]);

        $role->update($validated);

        return redirect()->route('admin.roles.index')->with('message', 'Role Updated Succesfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('message', 'Role Deleted');
    }

    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);

            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission not exists.');

    }
}
