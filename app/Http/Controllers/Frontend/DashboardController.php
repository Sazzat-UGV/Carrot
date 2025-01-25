<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role == 'Admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('frontend.pages.profile.dashboard');
    }

    public function profile(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone'   => 'required|numeric',
            'image'   => 'sometimes|image|mimes:png,jpg,jpeg|max:10240',
        ]);
        $user          = User::findOrFail(Auth::user()->id);
        $user->name    = $request->name ?? $user->name;
        $user->phone   = $request->phone ?? $user->phone;
        $user->address = $request->address ?? $user->address;
        if ($request->password) {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }
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
}
