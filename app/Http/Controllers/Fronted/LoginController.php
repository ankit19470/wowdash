<?php

namespace App\Http\Controllers\fronted;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        return view('fronted.sign-in');
    }
    public function login(Request $req)
    {
       $data= $req->validate([
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        if(Auth::attempt($data))
        {
          return redirect('/add-user')->with('success', 'Login Successfully !!');
        }
        return redirect()->back()->with('error', 'Invalid credentials, please try again.');
    }

}
