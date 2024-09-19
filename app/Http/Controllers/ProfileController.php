<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        // Fetch user data and return view
        // Assuming you use Laravel's authentication system
        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        $roles = Role::all();
        return view('fronted.view-profile', compact('user','role','roles'));
    }
    
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validation rules for updating the profile
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'pincode' => 'required|string|max:6',
            'address' => 'required|string|max:255',
            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'roles' => 'required|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle avatar upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-' . $file->getClientOriginalName(); // Add timestamp for uniqueness
            $file->storeAs('public/assets/uploads', $filename); // Ensure path matches filesystem configuration
            $user->file = $filename;
        }

        // Update user profile details
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->pincode = $request->input('pincode');
        $user->address = $request->input('address');
        $user->save();

        // Sync roles
        $user->syncRoles($request->input('roles'));

        // Redirect back with success message
        return redirect()->route('add-user')->with('success', 'Profile updated successfully!');
    }
}
