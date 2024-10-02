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
        $data = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($data)) {
            $user = Auth::user(); // Get the authenticated user

            // Fetch user roles
            $userRoles = $user->getRoleNames(); // Get the user's role names

            if ($userRoles->count() === 1) {
                // Redirect to the add-user route if one role is assigned
                return redirect()->route('add-user')->with('success', 'Login Successfully !!');
            } elseif ($userRoles->count() >= 2) {
                // Store roles in the session for the modal
                $req->session()->put('user_roles', $userRoles);
                return redirect()->route('user-role-show')->with('success', 'Login Successfully !!');
            }
        }

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
