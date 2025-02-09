<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function markSingle($notification_id)
    {
        $notification = DB::table('notifications')->where('id', $notification_id)->update([
            'read_at' => now(),
        ]);

        $redirect = request('redirect', route('admin.dashboard'));
        return redirect($redirect);
    }
    public function delete($notification_id)
    {
        $notification = DB::table('notifications')->where('id', $notification_id)->delete();
        return response()->json([
            'status'  => true,
            'message' => 'Notification delete successfully.',
        ]);
    }

    public function allNotification()
    {
        $notifications = Auth::user()->notifications;
        return view('backend.pages.notification', compact('notifications'));
    }
}
