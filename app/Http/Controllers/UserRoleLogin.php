<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleLogin extends Controller
{
    public function index()
    {
        if (session()->has('user-page')) {
            return redirect()->route('user-role-show');
        }
        return view('fronted.sign-in');
    }
    public function showRoles(Request $request)
    {
        $roles = Role::all(); // Fetch all roles
        $userRoles = collect($request->session()->get('user_roles', [])); // Convert to collection

        return view('fronted.user-role-show', compact('roles', 'userRoles')); // Pass both to the view
    }
}
