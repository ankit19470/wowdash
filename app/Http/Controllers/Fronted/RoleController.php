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

    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();

            return redirect()->route('list-role')->with('success', 'Role deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('list-role')->with('error', 'An error occurred while deleting the role.');
        }
    }
    public function edit($id)
{
    $role = Role::findOrFail($id); // Find the role by ID
    $permissions = Permission::all(); // Get all permissions

    return view('fronted.update-role', compact('role', 'permissions'));
}
public function update(Request $request, $id)
{
    // Find the role by ID
    $role = Role::findOrFail($id);

    // Define validation rules
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255|unique:roles,name,' . $id, // Ignore the current role during validation
        'permissions' => 'array',
        'permissions.*' => 'exists:permissions,name', // Validate each permission
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Update the role's name
    $role->name = $request->input('name');
    $role->save();

    // Sync permissions with the role
    if ($request->has('permissions')) {
        $role->syncPermissions($request->input('permissions'));
    } else {
        $role->syncPermissions([]); // Remove all permissions if none are selected
    }

    return redirect()->route('list-role')->with('success', 'Role updated successfully!');
}


}

