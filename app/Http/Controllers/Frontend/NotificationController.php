<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAll()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return response()->json([
            'status'  => true,
            'message' => 'All notification mark as read',
        ]);
    }
}
