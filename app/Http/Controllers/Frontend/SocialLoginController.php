<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleLoginCallback()
    {
        $google_user   = Socialite::driver('google')->user();
        $existing_user = User::where('google_id', $google_user->id)->first();
        if ($existing_user) {
            Auth::login($existing_user);
            return redirect()->route('dashboard')->with('success', 'Login successfully.');
        } else {
            $new_user = User::create([
                'name'              => $google_user->name,
                'email'             => $google_user->email,
                'google_id'         => $google_user->id,
                'image'             => $google_user->avatar,
                'email_verified_at' => now(),
                'password'          => Hash::make('1234'),
            ]);
            if ($new_user) {
                Auth::login($new_user);
                return redirect()->route('dashboard')->with('success', 'You are successfully register in the system.');
            }
        }
    }
    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookLoginCallback()
    {
        $facebook_user = Socialite::driver('facebook')->user();
        dd($facebook_user);
        $existing_user = User::where('facebook_id', $facebook_user->id)->first();
        if ($existing_user) {
            Auth::login($existing_user);
            return redirect()->route('dashboard')->with('success', 'Login successfully.');
        } else {
            $new_user = User::create([
                'name'              => $google_user->name,
                'email'             => $google_user->email,
                'google_id'         => $google_user->id,
                'image'             => $google_user->avatar,
                'email_verified_at' => now(),
                'password'          => Hash::make('1234'),
            ]);
            if ($new_user) {
                Auth::login($new_user);
                return redirect()->route('dashboard')->with('success', 'You are successfully register in the system.');
            }
        }
    }
}
