<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role == 'Admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('frontend.pages.dashboard.dashboard');
    }
}
