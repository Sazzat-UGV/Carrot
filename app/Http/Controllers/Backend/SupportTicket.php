<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket as ModelsSupportTicket;
use Illuminate\Http\Request;

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
            ->paginate($request->input('per_page', 10));

        return view('backend.pages.ticket.index', compact('tickets'));
    }

}
