<?php

namespace App\Http\Controllers\fronted;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;


class AddUserController extends Controller
{
    public function index()
    {
        return view('fronted.add-user');
    }

    public function AddUser(Request $req)
    {
        // Define validation rules
        $validator = Validator::make($req->all(), [

            'file' => 'required|mimes:jpeg,png,jpg|max:2048',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6',
            'phone' => 'required|digits:10|regex:/^[6-9]\d{9}$/',
            // 'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'pincode' => 'required|digits:6',
            'state' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle file upload
        $file = $req->file('file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('/public/assets/uploads', $filename);

        // Create new user
        $user = new User();
        $user->file = $filename;
        $user->firstname = $req->firstname;
        $user->lastname = $req->lastname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        // $user->address = $req->address;
        $user->city = $req->city;
        $user->pincode = $req->pincode;
        $user->state = $req->state;
        $user->usertype = 'U'; // Set the usertype value here

        // $user->save();
        try {
            $user->save();
  Auth::login($user);
  $req->session()->put('email', $user->email);
            return redirect()->route('add-user')->with('success', 'Added successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again.')->withInput();
        }
    }

    public function showUser()
{
    $users = User::where('usertype','U')->get();
    return view('fronted.list-user', ['users' => $users]);
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->back()->with('success', 'User deleted successfully');
}
public function edit($id)
{
    $user = User::findOrFail($id);
    $roles = Role::orderBy('name', 'ASC')->get(); // Fetch all roles
    $hasroles = $user->roles->pluck('id')->toArray(); // Get the user's current roles by ID

    return view('fronted.update-user', compact('user', 'roles', 'hasroles')); // Pass user, roles, and hasroles
}
public function update(Request $req, $id)
{
    $user = User::findOrFail($id);

    // Define validation rules
    $validator = Validator::make($req->all(), [
        'file' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        // 'password' => 'nullable|string|min:6',
        'phone' => 'required|digits:10|regex:/^[6-9]\d{9}$/',
        // 'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'pincode' => 'required|digits:6',
        'state' => 'required|string|max:255',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Handle file upload
    if ($req->hasFile('file')) {
        $file = $req->file('file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('/public/assets/uploads', $filename);
        $user->file = $filename;
    }

    // Update user details
    $user->firstname = $req->firstname;
    $user->lastname = $req->lastname;
    $user->email = $req->email;
    // if ($req->filled('password')) {
    //     $user->password = Hash::make($req->password);
    // }
    $user->phone = $req->phone;
    // $user->address = $req->address;
    $user->city = $req->city;
    $user->pincode = $req->pincode;
    $user->state = $req->state;
    $user->save();

    // $user->syncRoles($request->role);
    if ($req->has('role')) {
        $user->syncRoles($req->input('role', []));
    } else {
        $user->syncRoles([]);
    }
    try {
        return redirect()->route('list-user')->with('success', 'User updated successfully !!');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->back()->with('error', 'An error occurred. Please try again.')->withInput();
    }
}


}

