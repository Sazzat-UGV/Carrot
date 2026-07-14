<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Notifications\OrderNotification;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Raziul\Sslcommerz\Facades\Sslcommerz;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\StripeClient;

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
        try {
            DB::beginTransaction();
            $cart_content = Cart::content();

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
            $order->payment_type = $request->payment_method;
            $order->tax = Cart::tax(2, '.', '');
            $order->shipping_charge = 0;
            $order->status = 'Pending';
            $order->order_id = rand(100000, 999999);
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

            if ($request->payment_method == 'Stripe') {
                return $this->StripePayment($request, $order->total, $order->order_id);
            } elseif ($request->payment_method == 'PayPal') {
                return $this->PaypalPayment($request, $order->total, $order->order_id);

            } elseif ($request->payment_method == 'SSLCommerz') {

            }
        } catch (Exception $e) {
            DB::rollBack();
        }

        // ====================

        return redirect()->route('homePage')->with('success', 'Order placed successfully.');

        // ====================

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

    // ==================================================================================
    // ==================================================================================

    public function StripePayment(Request $request, $total_amount, $orderNumber)
    {
        $stripe = new StripeClient(config('stripe.stripe_sk'));

        $response = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'bdt',
                        'product_data' => [
                            'name' => 'Purchase Product',
                        ],
                        'unit_amount' => $total_amount * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'metadata' => [
                'order_id' => $orderNumber,
            ],
            'mode' => 'payment',
            'success_url' => route('stripe_success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('stripe_cancel').'?order_id='.$orderNumber,
        ]);

        if (isset($response->id) && $response->id != '') {
            return redirect($response->url);
        } else {
            return redirect()->route('stripe_cancel');
        }
    }

    public function Stripesuccess(Request $request)
    {
        if (isset($request->session_id)) {
            $stripe = new StripeClient(config('stripe.stripe_sk'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);

            if ($response) {
                $order = Order::where('order_id', $response->metadata->order_id)->first();
                $order->payment_status = $response->payment_status;
                $order->save();
            }

            return redirect()->route('homePage')->with('success', 'Order is placed successfully.');

        } else {
            return redirect()->route('stripe_cancel');
        }
    }

    public function Stripecancel(Request $request)
    {
        if ($request->has('order_id')) {
            $order = Order::where('order_id', $request->order_id)->first();

            if ($order) {
                $order->update([
                    'payment_status' => 'canceled',
                ]);
            }
        }

        return redirect()->route('homePage')->with('success', 'Order is canceled.');
    }

    public function PaypalPayment(Request $request, $total_amount, $orderNumber)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('paypal_success'),
                'cancel_url' => route('paypal_cancel'),
            ],
            'purchase_units' => [
                [
                    'custom_id' => $orderNumber,
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $total_amount,
                    ],
                ],
            ],
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            session()->put('paypal_order_number', $orderNumber);

            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->route('paypal_cancel');
    }

    public function PaypalSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $orderNumber = session()->get('paypal_order_number');

            $order = Order::where('order_id', $orderNumber)->first();

            if ($order) {
                $order->payment_status = 'paid';
                $order->save();
                session()->forget('paypal_order_number');

                return redirect()->route('homePage')->with('success', 'Payment successful and order placed.');
            }
        }

        return redirect()->route('paypal_cancel')->with('error', 'Payment failed or order not found.');
    }

    public function PaypalCancel()
    {
        return redirect()->route('homePage')->with('success', 'Order is canceled.');
    }
    // ====================================
    // ====================================

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
