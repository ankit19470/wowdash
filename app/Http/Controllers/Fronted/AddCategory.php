<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AddCategory extends Controller
{
    // public function showUsers(Request $request)
    // {
    //     // Check if the user has the right role
    //     if (!Auth::user()->hasRole('Admin')) {
    //         // Redirect to a different page (e.g., dashboard) with an error message
    //         return redirect()->route('user-page')->with('error', 'Access denied! You do not have permission to access this page.');
    //     }

    //     // If the user has the right role, fetch users
    //     $users = User::where('usertype', 'U')->get();
    //     return view('fronted.user-page', ['users' => $users]);
    // }
    public function showUsers(Request $request)
    {
        $users = User::where('usertype', 'U')->get();
        // Set the current page in the session
        // $request->session()->put('current_page', 'user-page');
        return view('fronted.user-page', ['users' => $users]);
    }
}

