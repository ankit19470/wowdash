<?php

namespace App\Http\Controllers\fronted;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User; // Make sure to include the User model

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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'pincode' => 'required|string|max:10',
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
        $user->address = $req->address;
        $user->city = $req->city;
        $user->pincode = $req->pincode;
        $user->state = $req->state;
        $user->save();
        try {
            return redirect()->route('add-user')->with('success', 'Added successfully !!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again.')->withInput();
        }
    }

    public function showUser()
{
    $users = User::all(); // Ensure the variable name is $users
    return view('fronted.list-user', ['users' => $users]); // Pass $users to the view
}

}

