<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all()->groupBy('group');
        
        return view('auth.admin.permissions.index', compact('roles', 'permissions'));
    }

    public function updateRolePermissions(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->permissions()->sync($request->permissions ?? []);
        
        return back()->with('success', 'Hak akses berhasil diperbarui!');
    }
}
