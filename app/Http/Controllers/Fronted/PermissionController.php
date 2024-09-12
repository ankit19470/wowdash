<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function index(){
        return view('fronted.add-permission');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('permissions.index')->with('success', 'Permission added successfully!');
    }

    public function ListPermission()
{
    $permissions=Permission::all();
    return view('fronted.list-permission',['permissions'=>$permissions]);
}
public function destroy($id)
{
    $permission = Permission::findOrFail($id);
    $permission->delete();

    return redirect()->route('list-permission')->with('success', 'Permission deleted successfully');
}
public function edit($id)
{
    $permission = Permission::findOrFail($id);
    return view('fronted.update-permission', compact('permission'));
}
public function update(Request $request, $id)
{
    // Find the permission by ID
    $permission = Permission::findOrFail($id);

    // Define validation rules
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255|unique:permissions,name,' . $id,
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Update permission details
    $permission->name = $request->name;
    $permission->save();

    try {
        return redirect()->route('list-permission')->with('success', 'Permission updated successfully!');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->back()->with('error', 'An error occurred. Please try again.')->withInput();
    }
}

}
