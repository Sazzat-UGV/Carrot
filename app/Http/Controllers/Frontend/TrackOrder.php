<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TrackOrder extends Controller
{
    public function trackOrderPage()
    {
        return view('frontend.pages.tracking.track');
    }

    public function trackOrder(Request $request)
    {
        $order = Order::where('order_id', $request->order_id)->first();
        return view('frontend.pages.tracking.track', compact('order'));
    }
}
