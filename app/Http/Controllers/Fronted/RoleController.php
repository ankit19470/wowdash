<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Permission;
// use App\Models\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;

use App\Models\Module;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {

        return view('fronted.add-roles');
    }


    public function store(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the role
        Role::create(['name' => $request->input('name')]);

        // Redirect with success message
        return redirect()->route('list-role')->with('success', 'Role created successfully!');
    }

    public function showRole()
    {
        $roles = Role::get(); // Fetch roles with their associated permissions
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
    public function edit(Role $role)
    {
        // $role = Role::findOrFail($id); // Find the role by ID
         $permissions = Permission::get(); // Get all permissions
        // $modules = Module::all(); // Get all modules

        return view('fronted.update-role', compact('role','permissions'));
    }

    public function update(Request $request, $id)
    {
        // Find the role by ID
        $role = Role::findOrFail($id);

        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles,name,' .$id, // Ignore the current role during validation
            'permissions' => 'array', // Ensure permissions is an array
        'permissions.*' => 'exists:permissions,name',

        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $role->name = $request->input('name');
        $role->save();

        // $role->syncPermissions($request->input('permission'));
        // $permissions = $request->input('permission', []); // Default to an empty array if not provided
        // $role->syncPermissions($permissions);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->input('permissions'));
        } else {
            $role->syncPermissions([]); // Remove all permissions if none are selected
        }
        return redirect()->route('list-role')->with('success', 'Role updated successfully!');
    }



}

