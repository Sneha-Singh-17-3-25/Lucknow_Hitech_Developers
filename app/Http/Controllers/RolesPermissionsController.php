<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class RolesPermissionsController extends Controller
{
    public function roles_index()
    {
        $roles = Role::all();
        return view('RolesPermissions.roles', compact('roles'));
    }

    public function roles_store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $role = Role::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'role' => $role,
        ]);
    }

    public function rolesEditUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:roles,id',
            'name' => 'required|string|max:255|unique:roles,name,' . $request->id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $role = Role::findOrFail($request->id);
        $role->name = $request->name;
        $role->save();

        return response()->json([
            'success' => true,
            'role' => $role
        ]);
    }

    public function delete_roles($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['success' => false, 'message' => 'Role not found.'], 404);
        }

        $role->delete();

        return response()->json([
            'success' => true,
            'role' => [
                'id' => $role->id,
                'name' => $role->name
            ]
        ]);
    }



    public function permissions_index()
    {
        $permissions = Permission::all();
        return view('RolesPermissions.permissions', compact('permissions'));
    }

    public function permission_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name'
        ]);

        $permission = Permission::create([
            'name' => $request->name
        ]);

        return response()->json([
            'success' => true,
            'permission' => $permission
        ]);
    }

    public function permissionEditUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:permissions,id',
            'name' => 'required|string|max:255',
        ]);

        $permission = Permission::find($request->id);
        $permission->name = $request->name;
        $permission->save();

        return response()->json(['success' => true]);
    }

    public function permissionDelete($id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();

            return response()->json([
                'success' => true,
                'permission' => [
                    'id' => $permission->id,
                    'name' => $permission->name
                ],
                'message' => 'Permission deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete permission.'
            ], 500);
        }
    }
}
