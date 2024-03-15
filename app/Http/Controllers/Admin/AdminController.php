<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_logout()
    {
        Auth::logout();
        return redirect()->route('admin.login_page');
    }
}
