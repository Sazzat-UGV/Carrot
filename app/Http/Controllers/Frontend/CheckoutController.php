<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Notifications\OrderNotification;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
            'email'        => 'required|email|max:255',
            'address'      => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'postalcode'   => 'required|numeric',
            'country'      => 'required|string|max:255',
            'region_state' => 'nullable|string|max:255',
        ]);
        $cart_content = Cart::content();
        if ($request->payment_method == "Cash On Delivery") {
            $order               = new Order();
            $order->user_id      = Auth::user()->id;
            $order->name         = $request->name;
            $order->email        = $request->email;
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
            $order->status          = 'Pending';
            $order->order_id        = rand(100000, 900000);
            $order->save();
            foreach ($cart_content as $row) {
                $order_details                 = new OrderDetail();
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
            $subject = 'Order Invoice';
            Mail::to($request->email)->send(new InvoiceMail($order, $cart_content, $subject));
            Cart::destroy();
            if (Session::has('coupon')) {
                Session::forget('coupon');
            }
            $data = [
                'image'   => Auth::user()->image,
                'type'    => 'order',
                'message' => 'A new order has been placed. Please review and process it.',
            ];
            $admin = User::findOrFail(1);
            $admin->notify(new OrderNotification($data));
            return redirect()->route('homePage')->with('success', 'Order placed successfully.');
        }

        if ($request->payment_method == "Stripe") {
            if (Session::has('coupon')) {
                $tax            = Cart::tax();
                $discountAmount = Session::get('coupon')['after_discount'];
                $total_amount   = ($tax + $discountAmount) * 100;
            } else {
                $total_amount = Cart::total() * 100;
            }
            $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));

            $response = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'line_items'           => [
                    [
                        'price_data' => [
                            'currency'     => 'usd',
                            'product_data' => [
                                'name' => 'Total Order Payment',
                            ],
                            'unit_amount'  => $total_amount,
                        ],
                        'quantity'   => 1,
                    ],
                ],
                'mode'                 => 'payment',
                'success_url'          => route('stripe_success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url'           => route('stripe_cancel'),
            ]);

            if (isset($response->id) && $response->id != '') {
                session()->put('stripe_session_id', $response->id);
                session()->put('cart', $cart_content);
                session()->put('total_amount', $total_amount);
                return redirect($response->url);
            } else {
                return redirect()->route('cancel');
            }
        }
    }

    public function Stripesuccess()
    {
        if (isset($request->session_id)) {

            $stripe   = new \Stripe\StripeClient(config('stripe.stripe_sk'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            //dd($response);

            $payment                 = new Payment();
            $payment->payment_id     = $response->id;
            $payment->product_name   = session()->get('product_name');
            $payment->quantity       = session()->get('quantity');
            $payment->amount         = session()->get('price');
            $payment->currency       = $response->currency;
            $payment->customer_name  = $response->customer_details->name;
            $payment->customer_email = $response->customer_details->email;
            $payment->payment_status = $response->status;
            $payment->payment_method = "Stripe";
            $payment->save();

            return "Payment is successful";

            session()->forget('product_name');
            session()->forget('quantity');
            session()->forget('price');

        } else {
            return redirect()->route('stripe_cancel');
        }
    }

    public function Stripecancel()
    {
        Session::forget('coupon');
        return redirect()->route('homePage')->with('success', 'Payment is canceled.');
    }
}
