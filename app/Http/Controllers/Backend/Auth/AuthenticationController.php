<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function loginPage()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string',
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = $request->has('remember');
        $verified_user = User::where('email', $request->email)->first();
        if ($verified_user) {
            if ($verified_user->email_verified_at != null && $verified_user->status == 1) {
                if (Auth::attempt($credentials, $remember)) {
                    $request->session()->regenerate();
                    flash()->success('Login successfully.');
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->back()->with('error', "You are not a valid user.");
                }
            }
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        flash()->success('Logout successfully.');
        return redirect()->route('admin.login.page');
    }
}
