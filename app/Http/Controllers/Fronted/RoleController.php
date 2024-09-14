<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $permissions = Permission::all(); // Fetch all permissions
        return view('fronted.add-roles', ['permissions' => $permissions]); // Show role creation form
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles,name',

        ]);

        if ($validator->passes()) {
            $role = Role::create(['name' => $request->name]);
            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $permission = Permission::where('name', $name)->first();
                    if ($permission) {
                        $role->givePermissionTo($permission); // Assign permission to the role
                    }
                }
            }
            return redirect()->route('list-role')->with('success', 'Role created successfully!');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function showRole()
    {
        $roles = Role::with('permissions')->get(); // Fetch roles with their associated permissions
        return view('fronted.list-role', compact('roles')); // Pass the roles to the view
    }



}

