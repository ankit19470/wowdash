<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Permission;
// use App\Models\Role;
// use Spatie\Permission\Models\Role;
use App\Models\Role; 
use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;

use App\Models\Module;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $modules = Module::all(); // Get all modules

        return view('fronted.add-roles',compact('modules'));
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
    // public function edit(Role $role)
    // {
    //     // Get all modules with their permissions
    //     $modules = Module::with('permissions')->get();

    //     // Get permission IDs assigned to this role
    //     $rolePermissions = $role->permissions->pluck('id')->toArray();

    //     return view('fronted.update-role', compact('role', 'modules', 'rolePermissions'));
    // }
//     public function edit(Role $role)
// {
//     // Get all modules with their permissions
//     // $modules = Module::with('permissions')->get();
//     $modules = Module::with('permissions')->get();

//     // Get the permission IDs assigned to this role
//     $rolePermissions = $role->permissions->pluck('id')->toArray();

//     return view('fronted.update-role', compact('role', 'modules', 'rolePermissions'));
// }
// public function edit(Role $role)
// {
//     // Fetch all modules with their permissions
//     $modules = Module::with('permissions')->get();

//     // Fetch the associated module IDs for the role
//     $roleModules = $role->modules ? $role->modules->pluck('id')->toArray() : [];

//     return view('fronted.update-role', compact('role', 'modules', 'roleModules'));
// }
public function edit(Role $role)
{
    $modules = Module::with('permissions')->get(); // Fetch all modules with their permissions
    $roleModules = $role->modules()->pluck('id')->toArray(); // Fetch associated module IDs for the role

    return view('fronted.update-role', compact('role', 'modules', 'roleModules'));
}




    public function update(Request $request, $id)
    {
        // Find the role by ID
        $role = Role::findOrFail($id);

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles,name,' . $id, // Ignore the current role during validation
            'permissions' => 'array', // Ensure permissions is an array
            'permissions.*' => 'exists:permissions,id', // Validate permission IDs
            'modules' => 'array', // Ensure modules is an array
            'modules.*' => 'exists:modules,id', // Validate module IDs
        ]);

        // // Check if validation fails
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // Update the role name
        $role->name = $request->input('name');
        $role->save();

        // Sync permissions (or remove all if none selected)
        if ($request->has('permissions')) {
            $role->syncPermissions($request->input('permissions'));
        } else {
            $role->syncPermissions([]); // Remove all permissions if none are selected
        }

        // Sync modules (create a relationship method for this if necessary)
        if ($request->has('modules')) {
            $role->modules()->sync($request->input('modules')); // Sync selected modules
        } else {
            $role->modules()->sync([]); // Remove all modules if none are selected
        }

        return redirect()->route('list-role')->with('success', 'Role updated successfully!');
    }




}

