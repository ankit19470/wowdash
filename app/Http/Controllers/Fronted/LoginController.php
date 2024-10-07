<?php

namespace App\Http\Controllers\fronted;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

//   public function index()
//   {

//     if(session()->has('email'))
//   {
//     // session()->pull('email');
//     return redirect()->route('add-user');
//   }
//     $pageConfigs = ['myLayout' => 'blank'];
//     return view('content.authentications.auth-login-cover', ['pageConfigs' => $pageConfigs]);
//   }
    public function index()
    {
     if(session()->has('email'))
{
    return redirect()->route('add-user');

}
        return view('fronted.sign-in');
    }
    public function login(Request $req)
    {
        // Validate the input
        $data = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($data)) {
            $user = Auth::user(); // Get the authenticated user

            // Fetch user roles
            $userRoles = $user->getRoleNames(); // Get the user's role names

            // If the user has no roles, handle it separately
            if ($userRoles->count() === 0) {
                // Optionally handle no role scenario, e.g., restrict access or redirect to a specific route
                return redirect()->route('add-user')->with('success', 'Login Successfully !!');

            }

            // If the user has exactly one role
            if ($userRoles->count() === 1) {
                // Redirect to the add-user route
                return redirect()->route('add-user')->with('success', 'Login Successfully !!');
            }

            // If the user has more than one role
            if ($userRoles->count() >= 2) {
                // Store roles in the session for role selection or modal display
                $req->session()->put('user_roles', $userRoles);
                return redirect()->route('user-role-show')->with('success', 'Login Successfully !!');
            }
        }

        // If authentication fails, redirect back with an error message
        return redirect()->back()->with('error', 'Invalid credentials, please try again.');
    }



}
// public function login(Request $req)
// {
//    $data= $req->validate([
//         'email'=>'required|email',
//         'password'=>'required|min:6',
//     ]);
//     if(Auth::attempt($data))
//     {
//        $req->session()->put('email',$data['email']);

//       return redirect('/add-user')->with('success', 'Login Successfully !!');
//     }
//     return redirect()->back()->with('error', 'Invalid credentials, please try again.');
// }
// $data=$req->validate([
//     'email'=>['required','email'],
//     'password'=>['required'],
//           ]);
//           if(Auth::attempt($data))
//           {
//           $req->session()->put('email',$data['email']);
//             return redirect('/add/add-user')->with('sucess', 'Login Successfully !!');
//           }
//           // return "<h2>username or password is invalid</h2>";
//           return redirect()->back()->with('error', 'Invalid credentials, please try again.');
//         }
