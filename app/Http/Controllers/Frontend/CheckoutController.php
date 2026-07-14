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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Raziul\Sslcommerz\Facades\Sslcommerz;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

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
                    $subtotal = floatval(preg_replace('/[^\d.]/', '', Cart::subtotal(2, '.', '')));
                    $coupon_amount = ($subtotal * $coupon->amount) / 100;
                }
                Session::put('coupon', [
                    'name' => $coupon->coupon_code,
                    'discount' => $coupon_amount,
                    'after_discount' => floatval(preg_replace('/[^\d.]/', '', Cart::subtotal(2, '.', ''))) - $coupon_amount,
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postalcode' => 'required|numeric',
            'country' => 'required|string|max:255',
            'region_state' => 'nullable|string|max:255',
        ]);
        $cart_content = Cart::content();
        if ($request->payment_method == 'Cash On Delivery') {

            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->post = $request->postalcode;
            $order->country = $request->country;
            $order->region_state = $request->region_state;
            if (Session::has('coupon')) {
                $order->subtotal = Cart::subtotal(2, '.', '');
                $order->coupon_code = Session::get('coupon')['name'];
                $order->coupon_discount = Session::get('coupon')['discount'];
                $order->after_discount = Session::get('coupon')['after_discount'];
            } else {
                $order->subtotal = Cart::subtotal(2, '.', '');
            }
            $order->total = Cart::total(2, '.', '');
            $order->payment_type = 'Cash On Delivery';
            $order->tax = Cart::tax(2, '.', '');
            $order->shipping_charge = 0;
            $order->status = 'Pending';
            $order->order_id = rand(100000, 900000);
            $order->save();
            foreach ($cart_content as $row) {
                $order_details = new OrderDetail;
                $order_details->order_id = $order->id;
                $order_details->product_id = $row->id;
                $order_details->product_name = $row->name;
                $order_details->color = $row->options->color;
                $order_details->size = $row->options->size;
                $order_details->qty = $row->qty;
                $order_details->single_price = $row->price;
                $order_details->subtotal_price = $row->price * $row->qty;
                $order_details->save();
            }
            $subject = 'Order Invoice';
            $subtotal = Cart::subtotal(2, '.', '');
            $cart_tax = Cart::tax(2, '.', '');
            $cart_total = Cart::total(2, '.', '');
            Mail::to($request->email)->send(new InvoiceMail($order, $cart_content, $subject, $subtotal, $cart_tax, $cart_total));
            Cart::destroy();
            if (Session::has('coupon')) {
                Session::forget('coupon');
            }
            $data = [
                'image' => Auth::user()->image,
                'type' => 'order',
                'message' => 'A new order has been placed. Please review and process it.',
            ];
            $admin = User::findOrFail(1);
            $admin->notify(new OrderNotification($data));

            DB::commit();

            return redirect()->route('homePage')->with('success', 'Order placed successfully.');
        }
        if ($request->payment_method == 'Stripe') {
            if (Session::has('coupon')) {
                $tax = Cart::tax(2, '.', '');
                $discountAmount = Session::get('coupon')['after_discount'];
                $total_amount = ($tax + $discountAmount) * 100;
            } else {
                $total_amount = (float) Cart::total() * 100;
            }
            $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));

            $response = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => 'Total Order Payment',
                            ],
                            'unit_amount' => $total_amount,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('stripe_success').'?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('stripe_cancel'),
            ]);

            if (isset($response->id) && $response->id != '') {
                session()->put('stripe_session_id', $response->id);
                session()->put('name', $request->name);
                session()->put('email', $request->email);
                session()->put('address', $request->address);
                session()->put('city', $request->city);
                session()->put('post', $request->postalcode);
                session()->put('country', $request->country);
                session()->put('region_state', $request->region_state);
                if (Session::has('coupon')) {
                    session()->put('subtotal', Cart::subtotal(2, '.', ''));
                    session()->put('coupon_code', Session::get('coupon')['name']);
                    session()->put('coupon_discount', Session::get('coupon')['discount']);
                    session()->put('after_discount', Session::get('coupon')['after_discount']);
                } else {
                    session()->put('subtotal', Cart::subtotal(2, '.', ''));
                }
                session()->put('total', Cart::total(2, '.', ''));
                session()->put('tax', Cart::tax(2, '.', ''));
                session()->put('cart', $cart_content);

                return redirect($response->url);
            } else {
                return redirect()->route('stripe_cancel');
            }
        }
        if ($request->payment_method == 'PayPal') {
            if (Session::has('coupon')) {
                $tax = Cart::tax(2, '.', '');
                $discountAmount = Session::get('coupon')['after_discount'];
                $total_amount = ($tax + $discountAmount);
            } else {
                $total_amount = (float) Cart::total(2, '.', '');
            }

            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                'intent' => 'CAPTURE',
                'application_context' => [
                    'return_url' => route('paypal_success'),
                    'cancel_url' => route('paypal_cancel'),
                ],
                'purchase_units' => [
                    [
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' => $total_amount,
                        ],
                    ],
                ],
            ]);
            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        session()->put('name', $request->name);
                        session()->put('email', $request->email);
                        session()->put('address', $request->address);
                        session()->put('city', $request->city);
                        session()->put('post', $request->postalcode);
                        session()->put('country', $request->country);
                        session()->put('region_state', $request->region_state);
                        if (Session::has('coupon')) {
                            session()->put('subtotal', Cart::subtotal(2, '.', ''));
                            session()->put('coupon_code', Session::get('coupon')['name']);
                            session()->put('coupon_discount', Session::get('coupon')['discount']);
                            session()->put('after_discount', Session::get('coupon')['after_discount']);
                        } else {
                            session()->put('subtotal', Cart::subtotal(2, '.', ''));
                        }
                        session()->put('total', Cart::total(2, '.', ''));
                        session()->put('tax', Cart::tax(2, '.', ''));
                        session()->put('cart', $cart_content);

                        return redirect()->away($link['href']);
                    }
                }
            } else {
                return redirect()->route('paypal_cancel');
            }
        }
        if ($request->payment_method == 'SSLCOMMERZ') {

            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->post = $request->postalcode;
            $order->country = $request->country;
            $order->region_state = $request->region_state;
            if (Session::has('coupon')) {
                $order->subtotal = Cart::subtotal(2, '.', '');
                $order->coupon_code = Session::get('coupon')['name'];
                $order->coupon_discount = Session::get('coupon')['discount'];
                $order->after_discount = Session::get('coupon')['after_discount'];
            } else {
                $order->subtotal = Cart::subtotal(2, '.', '');
            }
            $order->total = Cart::total(2, '.', '');
            $order->payment_type = 'SSLCOMMERZ';
            $order->tax = Cart::tax(2, '.', '');
            $order->shipping_charge = 0;
            $order->status = 'Pending';
            $order->order_id = rand(100000, 900000);
            $order->save();
            foreach ($cart_content as $row) {
                $order_details = new OrderDetail;
                $order_details->order_id = $order->id;
                $order_details->product_id = $row->id;
                $order_details->product_name = $row->name;
                $order_details->color = $row->options->color;
                $order_details->size = $row->options->size;
                $order_details->qty = $row->qty;
                $order_details->single_price = $row->price;
                $order_details->subtotal_price = $row->price * $row->qty;
                $order_details->save();
            }
            $subject = 'Order Invoice';
            $subtotal = Cart::subtotal(2, '.', '');
            $cart_tax = Cart::tax(2, '.', '');
            $cart_total = Cart::total(2, '.', '');
            Mail::to($request->email)->send(new InvoiceMail($order, $cart_content, $subject, $subtotal, $cart_tax, $cart_total));
            Cart::destroy();
            if (Session::has('coupon')) {
                Session::forget('coupon');
            }
            $data = [
                'image' => Auth::user()->image,
                'type' => 'order',
                'message' => 'A new order has been placed. Please review and process it.',
            ];
            $admin = User::findOrFail(1);
            $admin->notify(new OrderNotification($data));

            $response = Sslcommerz::setOrder($order->total, $order->order_id, 'E-commerce Products')
                ->setCustomer($order->name, $order->email, $order->address)
                ->setShippingInfo(1, $order->address)
                ->makePayment();

            if ($response->success()) {
                return redirect($response->gatewayPageURL());
            } else {
                return redirect()->route('homePage')->with('error', 'Payment gateway failed to initialize.');
            }
        }
    }

    public function Stripesuccess(Request $request)
    {
        DB::beginTransaction();
        if (isset($request->session_id)) {
            $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);

            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->name = session()->get('name');
            $order->email = session()->get('email');
            $order->address = session()->get('address');
            $order->city = session()->get('city');
            $order->post = session()->get('post');
            $order->country = session()->get('country');
            $order->region_state = session()->get('region_state');
            $order->subtotal = session()->get('subtotal');
            $order->coupon_code = session()->get('coupon_code');
            $order->coupon_discount = session()->get('coupon_discount');
            $order->after_discount = session()->get('after_discount');
            $order->total = session()->get('total');
            $order->payment_type = 'Stripe';
            $order->tax = session()->get('tax');
            $order->shipping_charge = 0;
            $order->status = 'Pending';
            $order->order_id = rand(100000, 900000);
            $order->save();
            foreach (session()->get('cart') as $row) {
                $order_details = new OrderDetail;
                $order_details->order_id = $order->id;
                $order_details->product_id = $row->id;
                $order_details->product_name = $row->name;
                $order_details->color = $row->options->color;
                $order_details->size = $row->options->size;
                $order_details->qty = $row->qty;
                $order_details->single_price = $row->price;
                $order_details->subtotal_price = $row->price * $row->qty;
                $order_details->save();
            }
            $subject = 'Order Invoice';
            $cart_content = session()->get('cart');
            $subtotal = session()->get('subtotal');
            $cart_tax = session()->get('tax');
            $cart_total = session()->get('total');
            Mail::to(session()->get('email'))->send(new InvoiceMail($order, $cart_content, $subject, $subtotal, $cart_tax, $cart_total));
            Cart::destroy();
            if (Session::has('coupon')) {
                Session::forget('coupon');
            }
            $data = [
                'image' => Auth::user()->image,
                'type' => 'order',
                'message' => 'A new order has been placed. Please review and process it.',
            ];
            $admin = User::findOrFail(1);
            $admin->notify(new OrderNotification($data));
            session()->forget('stripe_session_id');
            session()->forget('name');
            session()->forget('email');
            session()->forget('address');
            session()->forget('city');
            session()->forget('post');
            session()->forget('country');
            session()->forget('region_state');
            session()->forget('subtotal');
            session()->forget('coupon_code');
            session()->forget('coupon_discount');
            session()->forget('after_discount');
            session()->forget('total');
            session()->forget('tax');
            session()->forget('cart');
            Session::forget('coupon');

            DB::commit();

            return redirect()->route('homePage')->with('success', 'Order placed successfully.');
        } else {
            Session::forget('coupon');
            DB::rollBack();

            return redirect()->route('stripe_cancel');
        }
    }

    public function Stripecancel()
    {
        Session::forget('coupon');

        return redirect()->route('homePage')->with('success', 'Order is canceled.');
    }

    public function paypalSuccess(Request $request)
    {
        DB::beginTransaction();
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->name = session()->get('name');
            $order->email = session()->get('email');
            $order->address = session()->get('address');
            $order->city = session()->get('city');
            $order->post = session()->get('post');
            $order->country = session()->get('country');
            $order->region_state = session()->get('region_state');
            $order->subtotal = session()->get('subtotal');
            $order->coupon_code = session()->get('coupon_code');
            $order->coupon_discount = session()->get('coupon_discount');
            $order->after_discount = session()->get('after_discount');
            $order->total = session()->get('total');
            $order->payment_type = 'PayPal';
            $order->tax = session()->get('tax');
            $order->shipping_charge = 0;
            $order->status = 'Pending';
            $order->order_id = rand(100000, 900000);
            $order->save();
            foreach (session()->get('cart') as $row) {
                $order_details = new OrderDetail;
                $order_details->order_id = $order->id;
                $order_details->product_id = $row->id;
                $order_details->product_name = $row->name;
                $order_details->color = $row->options->color;
                $order_details->size = $row->options->size;
                $order_details->qty = $row->qty;
                $order_details->single_price = $row->price;
                $order_details->subtotal_price = $row->price * $row->qty;
                $order_details->save();
            }
            $subject = 'Order Invoice';
            $cart_content = session()->get('cart');
            $subtotal = session()->get('subtotal');
            $cart_tax = session()->get('tax');
            $cart_total = session()->get('total');
            Mail::to(session()->get('email'))->send(new InvoiceMail($order, $cart_content, $subject, $subtotal, $cart_tax, $cart_total));
            Cart::destroy();
            if (Session::has('coupon')) {
                Session::forget('coupon');
            }
            $data = [
                'image' => Auth::user()->image,
                'type' => 'order',
                'message' => 'A new order has been placed. Please review and process it.',
            ];
            $admin = User::findOrFail(1);
            $admin->notify(new OrderNotification($data));
            session()->forget('name');
            session()->forget('email');
            session()->forget('address');
            session()->forget('city');
            session()->forget('post');
            session()->forget('country');
            session()->forget('region_state');
            session()->forget('subtotal');
            session()->forget('coupon_code');
            session()->forget('coupon_discount');
            session()->forget('after_discount');
            session()->forget('total');
            session()->forget('tax');
            session()->forget('cart');
            Session::forget('coupon');

            DB::commit();

            return redirect()->route('homePage')->with('success', 'Order placed successfully.');
        } else {
            Session::forget('coupon');
            DB::rollBack();

            return redirect()->route('paypal_cancel');
        }
    }

    public function paypalCancel()
    {
        Session::forget('coupon');

        return redirect()->route('homePage')->with('success', 'Order is canceled.');
    }

    public function pay($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->firstOrFail();

        $response = Sslcommerz::setOrder(
            $order->total,                   // Total amount
            $order->order_number,            // Unique order number
            'E-commerce Products'            // Product category
        )
            ->setCustomer(
                $order->customer_name,           // Customer name
                'test@test.com',                 // Email
                $order->customer_phone           // Phone number
            )
            ->setShippingInfo(
                1,                               // Item quantity
                $order->shipping_address         // Customer address
            )
            ->makePayment();

        if ($response->success()) {
            return redirect($response->gatewayPageURL());
        }

        return redirect()->route('home')->with('error', 'Payment gateway failed to initialize.');
    }

    // পেমেন্ট সফল হওয়ার মেথড
    public function success(Request $request)
    {
        $transactionId = $request->input('tran_id');
        $amount = $request->input('amount');

        // Security Validation
        $isValid = Sslcommerz::validatePayment($request->all(), $transactionId, $amount);

        if ($isValid) {
            $order = Order::where('order_number', $transactionId)->first();

            if ($order) {
                $order->update(['status' => 'confirmed']);

                Payment::create([
                    'order_id' => $order->id,
                    'payment_number' => 'PAY-'.uniqid(),
                    'amount' => $amount,
                    'payment_method' => $request->input('card_type') ?? 'sslcommerz',
                    'status' => 'success',
                    'gateway_transaction_id' => $request->input('bank_tran_id'),
                    'paid_at' => now(),
                ]);

                return redirect()->route('checkout.success', $order->id)->with('success', 'Payment successful!');
            }
        }

        return redirect()->route('home')->with('error', 'Payment validation failed.');
    }

    // পেমেন্ট ফেইল হওয়ার মেথড
    public function failure(Request $request)
    {
        Order::where('order_number', $request->input('tran_id'))->update(['status' => 'failed']);

        return redirect()->route('home')->with('error', 'Payment failed.');
    }

    // পেমেন্ট ক্যান্সেল হওয়ার মেথড
    public function cancel(Request $request)
    {
        Order::where('order_number', $request->input('tran_id'))->update(['status' => 'cancelled']);

        return redirect()->route('home')->with('error', 'Payment was cancelled.');
    }

    // IPN (Instant Payment Notification) মেথড
    public function ipn(Request $request)
    {
        // SSLCommerz থেকে IPN রিকোয়েস্ট হ্যান্ডেল করার জন্য
        return response()->json(['status' => 'success']);
    }
}
