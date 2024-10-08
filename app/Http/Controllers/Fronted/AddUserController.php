<?php

namespace App\Http\Controllers\fronted;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AddUserController extends Controller
{
    // public function index()
    // {
    //     $roles = Role::pluck('name', 'name')->all(); // Fetching roles

    //     return view('fronted.add-user', compact('roles'));
    // }
    public function index(Request $req) // Make sure to include the $req parameter
    {
        $roleId = $req->query('role_id'); // Retrieve the role ID from the query string
        $roles = Role::pluck('name', 'name')->all(); // Fetching all role names
        $users = User::where('usertype', 'U')->get(); // Fetch users for reporting manager selection

        return view('fronted.add-user', compact('roles', 'users', 'roleId')); // Pass all data to the view
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
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'pincode' => 'required|digits:6',
            'state' => 'required|string|max:255',
             'roles' => 'required',
             'reporting_manager_id' => 'nullable|exists:users,id'
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
        // $user->assignRole($request->input('roles'));
        $user->file = $filename;
        $user->firstname = $req->firstname;
        $user->lastname = $req->lastname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->city = $req->city;
        $user->pincode = $req->pincode;
        $user->state = $req->state;
        $user->usertype = 'U'; // Set the usertype value here

        // $user->save();
            // Get valid role names
    $validRoleNames = Role::pluck('name')->toArray();
    $rolesToAssign = array_filter($req->input('roles'), function ($roleName) use ($validRoleNames) {
        return in_array($roleName, $validRoleNames);
    });

    // Handle cases where no valid roles are provided
    if (empty($rolesToAssign)) {
        return redirect()->back()->with('error', 'No valid roles provided.');
    }

    // Assign roles
    $user->syncRoles($rolesToAssign);
    $user->reporting_manager_id = $req->reporting_manager_id;
        try {
            $user->save();
            // $user->assignRole($req->input('roles'));
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
// public function edit($id)
// {
//     $user = User::findOrFail($id); // Find the user by ID
//     $roles = Role::pluck('name', 'name')->all(); // Get all roles
//     $userRole = $user->roles->pluck('name', 'name')->all(); // Get roles assigned to the user

//     return view('fronted.update-user', compact('user', 'roles', 'userRole')); // Pass 'user', 'roles', and 'userRole' to the view
// }
// public function edit($id)
// {
//     $user = User::findOrFail($id);

//     // Fetch all roles as an associative array: ['id' => 'name']
//     $roles = Role::pluck('name', 'id')->toArray();
//     $users = User::where('id', '!=', $user->id)->get();

//     // Fetch user's assigned roles as an array of role IDs
//     $userRole = $user->roles()->pluck('id')->toArray();  // Array of assigned role IDs

//     return view('fronted.update-user', compact('user', 'roles', 'userRole'));
// }

public function edit($id)
{
    $user = User::findOrFail($id);
    $roles = Role::pluck('name', 'id')->toArray();
    // Fetch users with usertype 'U'
    $users = User::where('usertype', 'U')->get();
    $userRole = $user->roles()->pluck('id')->toArray(); // Get user's assigned role IDs

    return view('fronted.update-user', compact('user', 'roles', 'userRole', 'users'));
}

public function update(Request $req, $id)
{
    $user = User::findOrFail($id); // Find user by ID

    // Define validation rules
    $validator = Validator::make($req->all(), [
        'file' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'phone' => 'required|digits:10|regex:/^[6-9]\d{9}$/',
        'city' => 'required|string|max:255',
        'pincode' => 'required|digits:6',
        'state' => 'required|string|max:255',
        'roles' => 'required|array',
        'reporting_manager_id' => 'nullable|exists:users,id'
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Handle file upload
    if ($req->hasFile('file')) {
        $file = $req->file('file');
        $filename = time() . '-' . $file->getClientOriginalName(); // Add timestamp for uniqueness
        $file->storeAs('/public/assets/uploads', $filename);
        $user->file = $filename;
    }

    // Update user details
    $user->firstname = $req->firstname;
    $user->lastname = $req->lastname;
    $user->email = $req->email;
    $user->phone = $req->phone;
    $user->city = $req->city;
    $user->pincode = $req->pincode;
    $user->state = $req->state;
    $user->reporting_manager_id = $req->reporting_manager_id;
    $user->save();

    // Sync roles with the user
    $user->syncRoles($req->input('roles'));

    try {
        return redirect()->route('list-user')->with('success', 'User updated successfully !!');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->back()->with('error', 'An error occurred. Please try again.')->withInput();
    }
}

public function filter(Request $request)
{
    // Validate the incoming request
    $request->validate([
        // 'search' => 'nullable|string',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
    ]);

    // Get the search query, start date, and end date from the request
    // $search = $request->input('search');
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Build the query for filtering users
    $users = User::query();

    // If search query is provided, filter by name or email
    // if ($search) {
    //     $users->where(function($query) use ($search) {
    //         $query->where('firstname', 'like', '%' . $search . '%')
    //               ->orWhere('lastname', 'like', '%' . $search . '%')
    //               ->orWhere('email', 'like', '%' . $search . '%');
    //     });
    // }

    // If start date is provided
    if ($startDate) {
        $users->whereDate('created_at', '>=', $startDate);
    }

    // If end date is provided
    if ($endDate) {
        $users->whereDate('created_at', '<=', $endDate);
    }

    // Execute the query and get the filtered results
    $users = $users->get();

    // Return the view with the filtered data
    return view('fronted.list-user', compact('users'));
}




}
