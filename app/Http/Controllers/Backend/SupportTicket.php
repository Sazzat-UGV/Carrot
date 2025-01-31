<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket as ModelsSupportTicket;
use Illuminate\Http\Request;

class SupportTicket extends Controller
{
    public function allTicket(Request $request)
    {
        $tickets = ModelsSupportTicket::with('user:id,name,email');
        $tickets->when($request->ticket_type !== "All", function ($query) use ($request) {
            $query->where('service', $request->ticket_type);
        });

        $tickets->when($request->status !== "All", function ($query) use ($request) {
            $query->where('status', $request->status);
        });

        $tickets->when($request->date, function ($query) use ($request) {
            $query->whereDate('created_at', $request->date);
        });

        $tickets->when($request->search, function ($query) use ($request) {
            $query->where('subject', 'LIKE', '%' . $request->search . '%');
        });

        $tickets = $tickets->paginate();
        return view('backend.pages.ticket.index', compact('tickets'));
    }
}
