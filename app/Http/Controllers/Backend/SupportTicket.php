<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ReplyTicket;
use App\Models\SupportTicket as ModelsSupportTicket;
use App\Models\SupportTicket as SupportTicketModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportTicket extends Controller
{
    public function allTicket(Request $request)
    {
        $tickets = ModelsSupportTicket::with('user:id,name,email')
            ->when($request->ticket_type && $request->ticket_type != 'All', function ($query) use ($request) {
                $query->where('service', $request->ticket_type);
            })
            ->when($request->status && $request->status != 'All', function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when($request->date, function ($query) use ($request) {
                $query->whereDate('created_at', $request->date);
            })
            ->when($request->search, function ($query) use ($request) {
                $query->where('subject', 'LIKE', '%' . $request->search . '%');
            })
            ->latest('id')->paginate($request->input('per_page', 10));

        return view('backend.pages.ticket.index', compact('tickets'));
    }

    public function show($id)
    {
        $ticket  = ModelsSupportTicket::with('user:id,name')->findOrFail($id);
        $replies = ReplyTicket::where('ticket_id', $id)->get();
        return view('backend.pages.ticket.show', compact('ticket', 'replies'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:10240',
        ]);
        $ticket         = ModelsSupportTicket::findOrFail($id);
        $ticket->status = 'Replied';
        $ticket->save();
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

    public function status($id)
    {
        $ticket = SupportTicketModel::where('id', $id)->first();
        $ticket->update([
            'status' => 'Closed',
        ]);
        return back()->with('success', 'Status updated successfully.');
    }
    public function delete($id)
    {
        $ticket = SupportTicketModel::findOrFail($id);
        if ($ticket->image && file_exists(public_path('uploads/ticket/' . $ticket->image))) {
            unlink(public_path('uploads/ticket/' . $ticket->image));
        }
        $replies = ReplyTicket::where('ticket_id', $id)->get();
        foreach ($replies as $reply) {
            if ($reply->image && file_exists(public_path('uploads/ticket/' . $reply->image))) {
                unlink(public_path('uploads/ticket/' . $reply->image));
            }
        }
        ReplyTicket::where('ticket_id', $id)->delete();
        $ticket->delete();
        return back()->with('success', 'Ticket deleted successfully.');
    }
}
