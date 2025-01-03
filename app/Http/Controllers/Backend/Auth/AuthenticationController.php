<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function loginPage(){
        return view('backend.auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email|max:255',
            'password'=>'required|string',
        ]);

    }
}
