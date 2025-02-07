<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ReplyTicket;
use App\Models\SupportTicket;
use App\Models\User;
use App\Notifications\SupportTicketNotification;
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
        $total_order    = Order::where('user_id', Auth::id())->count();
        $complete_order = Order::where('user_id', Auth::id())->where('status', 'Complete')->count();
        $cancel_order   = Order::where('user_id', Auth::id())->where('status', 'Cancel')->count();
        $return_order   = Order::where('user_id', Auth::id())->where('status', 'Return')->count();
        $orders         = Order::where('user_id', Auth::id())->latest('id')->take(3)->get();
        return view('frontend.pages.profile.dashboard', compact('total_order', 'complete_order', 'cancel_order', 'return_order', 'orders'));
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'address'      => 'required|string|max:255',
            'phone'        => 'required|numeric',
            'city'         => 'required|string|max:255',
            'postalcode'   => 'required|numeric',
            'country'      => 'required|string|max:255',
            'region_state' => 'nullable|string|max:255',
        ]);
        $user               = User::findOrFail(Auth::user()->id);
        $user->name         = $request->name ?? $user->name;
        $user->phone        = $request->phone ?? $user->phone;
        $user->address      = $request->address ?? $user->address;
        $user->city         = $request->city ?? $user->city;
        $user->postalcode   = $request->postalcode ?? $user->postalcode;
        $user->country      = $request->country ?? $user->country;
        $user->region_state = $request->region_state ?? $user->region_state;
        if ($request->password) {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'image' => 'sometimes|image|mimes:png,jpg,jpeg|max:10240',
        ]);
        $uploaded_photo = $request->file('image');
        $user           = User::findOrFail(Auth::id());
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
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function profile()
    {
        return view('frontend.pages.profile.profile');
    }

    public function myOrderPage()
    {
        $orders = Order::where('user_id', Auth::id())->latest('id')->paginate(5);
        return view('frontend.pages.profile.my_order', compact('orders'));
    }

    public function allTicket()
    {
        $tickets = SupportTicket::where('user_id', Auth::id())->latest('id')->paginate(4);
        return view('frontend.pages.profile.ticket', compact('tickets'));
    }

    public function newTicket()
    {
        return view('frontend.pages.profile.new_ticket');
    }

    public function newTicketSubmit(Request $request)
    {
        $request->validate([
            'subject'      => 'required|string|max:255',
            'service'      => 'required|string',
            'priority'     => 'required|string',
            'message'      => 'required|string',
            'ticket_image' => 'sometimes|image|mimes:png,jpg,jpeg|max:10240',
        ]);
        $support_ticket           = new SupportTicket();
        $support_ticket->user_id  = Auth::id();
        $support_ticket->subject  = $request->subject;
        $support_ticket->service  = $request->service;
        $support_ticket->priority = $request->priority;
        $support_ticket->message  = $request->message;
        $support_ticket->status   = 'Pending';
        if ($request->hasFile('ticket_image')) {
            $uploaded_photo = $request->file('ticket_image');
            $photo_location = 'uploads/ticket/';
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $uploaded_photo->move(public_path($photo_location), $new_photo_name);
            $support_ticket->image = $new_photo_name;
        }
        $support_ticket->save();

        $data = [
            'image'   => Auth::user()->image,
            'message' => $request->message,
            'type'    => 'support_ticket',
        ];
        $admin = User::findOrFail(1);
        $admin->notify(new SupportTicketNotification($data));
        return redirect()->route('open.ticket')->with('success', 'Ticket submitted successfully.');
    }

    public function replyTicket($id)
    {
        $ticket  = SupportTicket::where('id', $id)->where('user_id', Auth::id())->first();
        $replies = ReplyTicket::where('ticket_id', $id)->get();
        return view('frontend.pages.profile.reply_ticket', compact('ticket', 'replies'));
    }

    public function replyTicketSubmit(Request $request, $id)
    {
        $request->validate([
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:10240',
        ]);
        $reply_ticket            = new ReplyTicket();
        $reply_ticket->ticket_id = $id;
        $reply_ticket->user_id   = Auth::id();
        $reply_ticket->message   = $request->message;
        if ($request->hasFile('image')) {
            $uploaded_photo = $request->file('image');
            $photo_location = 'uploads/ticket/';
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $uploaded_photo->move(public_path($photo_location), $new_photo_name);
            $reply_ticket->image = $new_photo_name;
        }
        $reply_ticket->save();
        return redirect()->back()->with('success', 'Reply submitted successfully.');
    }
}
