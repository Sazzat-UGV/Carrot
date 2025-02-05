<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\OrderStatusMail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function delete($id)
    {
        OrderDetail::where('order_id', $id)->delete();
        $order = Order::findOrFail($id);
        $order->delete();
        return back()->with('success', 'Order deleted successfully.');
    }

    public function changeStatus(Request $request, $id)
    {
        $order         = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        $cart_content = $order->orderDetails;
        if ($order->status == 'Pending') {
            $subject = 'Your Order is Pending';
        } elseif ($order->status == 'Received') {
            $subject = 'We’ve Received Your Order';
        } elseif ($order->status == 'Shipped') {
            $subject = 'Your Order is Shipped';
        } elseif ($order->status == 'Complete') {
            $subject = 'Order Delivered';
        } elseif ($order->status == 'Return') {
            $subject = 'Return Request Processed';
        } elseif ($order->status == 'Cancel') {
            $subject = 'Order Cancelled';
        }

        Mail::to($order->email)->send(new OrderStatusMail($order, $cart_content, $subject));
        return response()->json([
            'status'  => true,
            'message' => 'Updated Successfully',
            'data'    => $order,
        ]);
    }

}
