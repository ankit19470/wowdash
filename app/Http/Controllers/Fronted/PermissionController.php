<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Permission;

use App\Models\Module;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $modules = Module::all();

        return view('fronted.add-permission', compact('modules'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
            // 'module' => 'required|string',
            'module_id' => 'required|exists:modules,id',  // Assuming module is a string. If it's an ID, use 'required|exists:modules,id'.
        ]);

        // Create a new permission
        $permission = new Permission;
        $permission->name = $request->name;
        $permission->module_id = $request->input('module_id');

        // If you want to save a module ID or a module name, adjust this according to your needs.
        // $permission->module = $request->module;

        $permission->save(); // Save the permission to the database

        return redirect()->route('permissions.index')->with('success', 'Permission added successfully!');
    }

//     public function ListPermission()
// {
//     $permissions=Permission::all();
//     $modules = Module::all();

//     return view('fronted.list-permission',['permissions'=>$permissions],['modules'=>$modules],);
// }
public function ListPermission()
{
    $permissions = Permission::all();
    $modules = Module::all();
    

    return view('fronted.list-permission', [
        'permissions' => $permissions,
        'modules' => $modules,
    ]);
}
public function destroy($id)
{
    $permission = Permission::findOrFail($id);
    $permission->delete();

    return redirect()->route('list-permission')->with('success', 'Permission deleted successfully');
}
// public function edit($id)
// {
//     $permission = Permission::findOrFail($id);
//     // $product = Product::find($id);
//     $modules = Module::find($id);


//     return view('fronted.update-permission', compact('permission,modules'));
// }
public function edit($id)
{
    // Fetch the permission by ID
    $permission = Permission::findOrFail($id);

    // Fetch all modules
    $modules = Module::all();

    // Pass both permission and modules to the view
    return view('fronted.update-permission', compact('permission', 'modules'));
}

public function update(Request $request, $id)
{
    // Find the permission by ID
    $permission = Permission::findOrFail($id);

    // Define validation rules
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255|unique:permissions,name,'.$permission->id, // Corrected here
        // 'module' => 'required|string', // Ensure module is validated correctly
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Update permission details
    $permission->name = $request->name;
    $permission->module_id = $request->input('module_id'); // Ensure the module_id is being updated

    // Save the updated permission
    try {
        $permission->save();
        return redirect()->route('list-permission')->with('success', 'Permission updated successfully!');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->back()->with('error', 'An error occurred. Please try again.')->withInput();
    }
}


}
