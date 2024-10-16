<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleLogin extends Controller
{
    // public function index()
    // {
    //     if (session()->has('user-page')) {
    //         return redirect()->route('user-role-show');
    //     }
    //     return view('fronted.sign-in');
    // }
    public function index()
{
    // Only redirect if the user-page session is set and the user is not already on the user-role-show page
    if (session()->has('user-page') && request()->route()->getName() !== 'user-role-show') {
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

    public function setUserRole(Request $request)
    {

        // session()->forget('user_role');

        // dd(session()->get('user_role'));
        // Validate the incoming request
        $request->validate([
            'role' => 'required|string',
        ]);

        // Store the role in the session
        $request->session()->put('user_role', $request->role);
        $currentRole = $request->session()->get('user_role');

        if(isset($currentRole) && $currentRole === "Admin"){
            return response()->json(["success" => true,"url" => "/user-page"]);
        }else if( isset($currentRole) && $currentRole === 'user'){
            return response()->json(["success" => true,"url" => "/add-user"]);
        }



        // dd();

        return response()->json(['success' => false]);
    }

}
