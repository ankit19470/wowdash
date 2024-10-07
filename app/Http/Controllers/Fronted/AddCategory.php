<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AddCategory extends Controller
{
    public function showUsers()
    {
        $users = User::where('usertype','U')->get();
        return view('fronted.user-page', ['users' => $users]);
    }

    

}
