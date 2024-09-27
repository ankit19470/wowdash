<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
class ProfileController extends Controller
{
    public function changePassword(Request $request)
    {
        // Validate the input data
        $request->validate([
            'current_password' => 'required', // current password field
            'new_password' => 'required|string|min:8|confirmed', // confirmed = new_password + new_password_confirmation
        ]);

        // Get the current authenticated user
        $user = Auth::user();

        // Check if the current password matches the user's password in the database
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Your current password does not match.']);
        }

        // Update the user's password in the database
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Return success message
        return back()->with('success', 'Your password has been changed successfully.');
    }
    public function profile()
    {
        $user = Auth::user(); // This should be a single user instance
        $role = $user->getRoleNames()->first();
        $roles = Role::all();
        // $users = User::where('id', '!=', $user->id)->get(); // Collection of users
    $users = User::where('usertype', 'U')->get();


        return view('fronted.view-profile', compact('user', 'role', 'roles', 'users'));
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
            'roles' => 'required|array',
        'reporting_manager_id' => 'nullable|exists:users,id'

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
    $user->reporting_manager_id = $request->input('reporting_manager_id');

          // Update reporting manager relationship if exists

        $user->save();

        // Sync roles
        $user->syncRoles($request->input('roles'));

        // Redirect back with success message
        return redirect()->route('add-user')->with('success', 'Profile updated successfully!');
    }
}
