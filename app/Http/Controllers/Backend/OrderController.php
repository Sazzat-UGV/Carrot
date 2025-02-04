<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::latest('id');
        if ($request->search) {
            $orders = $orders->where('order_id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%');
        }
        if ($request->date) {
            $orders = $orders->whereDate('created_at', $request->date);
        }
        $orders = $orders->when($request->payment_type && $request->payment_type != 'All', function ($query) use ($request) {
            return $query->where('payment_type', $request->payment_type);
        });

        $orders = $orders->when($request->status && $request->status != 'All', function ($query) use ($request) {
            return $query->where('status', $request->status);
        });
        $orders = $orders->paginate(10);
        return view('backend.pages.orders', compact('orders'));
    }
}
