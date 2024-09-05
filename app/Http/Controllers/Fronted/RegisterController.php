<?php
namespace App\Http\Controllers\Fronted;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('fronted.sign'); // Ensure this view exists
    }

    public function register(Request $req)
    {
        // Validate the incoming request data
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Create a new user and save to the database
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        // Redirect to the sign-in page with a success message
        return redirect()->route('sign-in')->with('success', 'Register successfully !!');
    }
}


