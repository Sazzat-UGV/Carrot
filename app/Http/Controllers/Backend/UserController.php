<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('role', 'User');
        if ($request->search) {
            $users = $users->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                ->orWhere('address', 'LIKE', '%' . $request->search . '%')
                ->orWhere('phone', 'LIKE', '%' . $request->search . '%');
        }
        $users = $users->latest('id')->paginate(10);
        return view('backend.pages.user.index', compact('users'));
    }

    public function changeStatus($id)
    {
        $user = User::findOrFail($id);
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Status Updated',
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.pages.user.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->image != 'default_profile.png') {
            $old_photo_path = base_path('public/uploads/user/' . $user->image);

            if (file_exists($old_photo_path)) {
                unlink($old_photo_path);
            }
        }
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
