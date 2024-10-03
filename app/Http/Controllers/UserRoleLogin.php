<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Module;

class UserRoleLogin extends Controller
{
    public function showModulesAndPermissions($id)
    {
        // Fetch the selected role
        $role = Role::findOrFail($id);

        // Fetch all modules along with their permissions
        $modules = Module::with('permissions')->get();

        // Get the permissions assigned to the role
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        // Return the view with role, modules, and the role's permissions
        return view('fronted.show-modules-permissions', compact('role', 'modules', 'rolePermissions'));
    }
    public function assignPermissions(Request $request, $id)
{
    $role = Role::findOrFail($id);

    // Validate the permissions array
    $request->validate([
        'permissions' => 'array',
        'permissions.*' => 'exists:permissions,id',
    ]);

    // Sync the permissions
    $role->syncPermissions($request->permissions);

    return redirect()->back()->with('success', 'Permissions updated successfully!');
}

}


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Spatie\Permission\Models\Role;

// class UserRoleLogin extends Controller
// {
//     public function showRoles(Request $request)
//     {
//         $roles = Role::all(); // Fetch all roles
//         $userRoles = collect($request->session()->get('user_roles', [])); // Convert to collection

//         return view('fronted.user-role-show', compact('roles', 'userRoles')); // Pass both to the view
//     }

// }

// public function showModulesAndPermissions($id)
// {
//     // Ensure Role exists
//     $role = Role::findOrFail($id);

//     // Fetch all modules (adjust your model as necessary)
//     $modules = Module::with('permissions')->get();

//     // Fetch permissions associated with the role
//     $rolePermissions = $role->permissions()->pluck('id')->toArray();

//     return response()->json([
//         'role' => $role,
//         'modules' => $modules,
//         'rolePermissions' => $rolePermissions,
//     ]);
// }
