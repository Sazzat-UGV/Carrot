<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class ProfileController extends Controller
{
    public function profilePage()
    {
        return view('backend.pages.profile.profile');
    }

    public function profile(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|numeric',
            'image' => 'sometimes|image|mimes:png,jpg,jpeg|max:10240',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name ?? $user->name;
        $user->phone = $request->phone ?? $user->phone;
        $user->address = $request->address ?? $user->address;
        $user->save();
        if ($request->hasFile('image')) {
            $this->image_upload($request->file('image'), $user);
        }
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function image_upload($uploaded_photo, $user)
    {
        $user = User::findOrFail($user->id);
        if ($user->image != 'default_profile.png') {
            $old_photo_path = base_path('public/uploads/user/' . $user->image);

            if (file_exists($old_photo_path)) {
                unlink($old_photo_path);
            }
        }
        $photo_location = 'public/uploads/user/';
        $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
        $new_photo_path = base_path($photo_location . $new_photo_name);
        Image::make($uploaded_photo)->save($new_photo_path);
        $user->update([
            'image' => $new_photo_name,
        ]);
    }

    public function changePasswordPage()
    {
        return view('backend.pages.profile.change_password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|same:confirm_new_password|regex:/^(?=.*[a-z])(?=.*[\d\s\W]).+$/',
            'confirm_new_password' => 'required',
        ],
            [
                'new_password.regex' => 'The password must be at least 6 characters long and include at least one lowercase letter and one number, symbol, or whitespace.',
            ]);

        $user = User::where('id', Auth::user()->id)->first();
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            flash()->success('Password has been updated.');
            return redirect()->back();
        }
        return redirect()->back()->with('error', "Password doesn't match with current password.");
    }
}
