<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkoutPage()
    {
        $cart_items = Cart::content();
        return view('frontend.pages.checkout', compact('cart_items'));
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string',
        ]);
        $coupon = Coupon::where('coupon_code', $request->coupon_code)->where('status', 1)->first();
        if ($coupon) {
            if (date('Y-m-d', strtotime(date('Y-m-d'))) <= date('Y-m-d', strtotime($coupon->validate_date))) {

                if ($coupon->type == 'Fixed') {
                    $coupon_amount = $coupon->amount;
                }
                if ($coupon->type == 'Percentage') {
                    $subtotal      = floatval(preg_replace('/[^\d.]/', '', Cart::subtotal()));
                    $coupon_amount = ($subtotal * $coupon->amount) / 100;
                }
                Session::put('coupon', [
                    'name'           => $coupon->coupon_code,
                    'discount'       => $coupon_amount,
                    'after_discount' => floatval(preg_replace('/[^\d.]/', '', Cart::subtotal())) - $coupon_amount,
                ]);
                return back()->with('success', 'Coupon Applied.');
            } else {
                return back()->with('error', 'Coupon date expired.');
            }
        }
        return back()->with('error', 'Invalid coupon code.');
    }

    public function removeCoupon()
    {
        Session::forget('coupon');
        return back()->with('success', 'Coupon removed successfully.');
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'phone'        => 'required|string|max:15',
            'address'      => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'postalcode'   => 'required|numeric',
            'country'      => 'required|string|max:255',
            'region_state' => 'nullable|string|max:255',
        ]);
        $order               = new Order();
        $order->user_id      = Auth::user()->id;
        $order->name         = $request->name;
        $order->phone        = $request->phone;
        $order->address      = $request->address;
        $order->city         = $request->city;
        $order->post         = $request->postalcode;
        $order->country      = $request->country;
        $order->region_state = $request->region_state;
        if (Session::has('coupon')) {
            $order->subtotal        = Cart::subtotal();
            $order->coupon_code     = Session::get('coupon')['name'];
            $order->coupon_discount = Session::get('coupon')['discount'];
            $order->after_discount  = Session::get('coupon')['after_discount'];
        } else {
            $order->subtotal = Cart::subtotal();
        }
        $order->total           = Cart::total();
        $order->payment_type    = $request->payment_method;
        $order->tax             = Cart::tax();
        $order->shipping_charge = 0;
        $order->status          = 0;
        $order->order_id        = rand(10000, 900000);
        $order->save();

        $cart_content  = Cart::content();
        $order_details = new OrderDetail();
        foreach ($cart_content as $row) {
            $order_details->order_id       = $order->id;
            $order_details->product_id     = $row->id;
            $order_details->product_name   = $row->name;
            $order_details->color          = $row->options->color;
            $order_details->size           = $row->options->size;
            $order_details->qty            = $row->qty;
            $order_details->single_price   = $row->price;
            $order_details->subtotal_price = $row->price * $row->qty;
            $order_details->save();
        }

        Mail::to($request->email)->send(new InvoiceMail($order,$order_details));
        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        return redirect()->route('homePage')->with('success', 'Order placed successfully.');
    }
}
