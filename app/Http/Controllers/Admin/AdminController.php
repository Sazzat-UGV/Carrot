<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminController extends Controller
{
    public function admin_logout()
    {
        Auth::logout();
        return redirect()->route('admin.login_page');
    }

    public function profile_page()
    {
        return view('admin.pages.profile.profile');
    }

    public function edit_profile_page()
    {
        return view('admin.pages.profile.edit_profile');
    }

    public function edit_profile(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        Toastr::success('Profile has been updated!');
        return redirect()->route('admin.profile_page');
    }

    public function profile_image_update(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required|mimes:png,jpg|max:10240',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([]);
        $this->image_upload($request, $user->id);
        Toastr::success('Profile picture has been updated!');
        return back();
    }

    public function image_upload($request, $user_id)
    {
        $user = User::findorFail($user_id);

        if ($request->hasFile('image')) {
            if ($user->image != 'default_profile.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/user/';
                $old_photo_location = $photo_location . $user->image;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/user/';
            $uploaded_photo = $request->file('image');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(1000, 1000)->save(base_path($new_photo_location));
            $check = $user->update([
                'image' => $new_photo_name,
            ]);
        }
    }

    public function change_password_page()
    {
        return view('admin.pages.profile.change_password');
    }

    public function change_password(Request $request, $id)
    {
        $validate = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|same:retype_password',
        ]);

        $currentPassword = Hash::check($request->current_password, Auth::user()->password);

        if ($currentPassword) {
            $user = User::findorFail($id);
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            Auth::logout();
            Toastr::success('Password has been changed successfully!');
            return redirect()->route('admin.login_page');
        } else {
            Toastr::error('Invalid current password!');
            return back();
        }
    }
}
