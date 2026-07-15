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
            'payment_method' => 'required',
        ]);

        Session::put('order_request_data', $request->all());

        $totalAmount = Cart::total(2, '.', '');
        $orderNumber = rand(100000, 999999);

        if ($request->payment_method == 'Cash On Delivery') {
            $order = $this->saveOrderToDatabase('Cash On Delivery');
            if ($order) {
                return redirect()->route('homePage')->with('success', 'Order placed successfully!');
            } else {
                return redirect()->back()->with('error', 'Something went wrong, please try again.');
            }
        } elseif ($request->payment_method == 'Stripe') {
            return $this->StripePayment($request, $totalAmount, $orderNumber);
        } elseif ($request->payment_method == 'PayPal') {
            return $this->PaypalPayment($request, $totalAmount, $orderNumber);
        } elseif ($request->payment_method == 'SSLCOMMERZ') {
            return $this->sslPayment($request, $totalAmount, $orderNumber);
        }

        return redirect()->back()->with('error', 'Invalid Payment Method.');
    }

    private function saveOrderToDatabase($paymentType)
    {
        $requestData = Session::get('order_request_data');

        DB::beginTransaction();
        try {
            $order = new Order;
            $order->user_id = Auth::id();
            $order->name = $requestData['name'];
            $order->email = $requestData['email'];
            $order->address = $requestData['address'];
            $order->city = $requestData['city'];
            $order->post = $requestData['postalcode'];
            $order->country = $requestData['country'];
            $order->subtotal = Cart::subtotal(2, '.', '');
            $order->total = Cart::total(2, '.', '');
            $order->payment_type = $paymentType;
            $order->payment_status = $paymentType == 'Cash On Delivery' ? 'pending' : 'paid';
            $order->status = 'Pending';
            $order->order_id = rand(100000, 999999);
            $order->save();

            foreach (Cart::content() as $row) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $row->id,
                    'product_name' => $row->name,
                    'qty' => $row->qty,
                    'single_price' => $row->price,
                    'subtotal_price' => $row->price * $row->qty,
                ]);
            }

            $data = [
                'image' => Auth::user()->image,
                'type' => 'order',
                'message' => 'A new order has been placed. Please review and process it.',
            ];
            Mail::to($order->email)->send(new InvoiceMail($order, Cart::content(), 'Order Invoice', Cart::subtotal(), Cart::tax(), Cart::total()));
            $admin = User::findOrFail(1);
            $admin->notify(new OrderNotification($data));

            Cart::destroy();
            Session::forget(['order_request_data', 'coupon']);

            DB::commit();

            return $order;
        } catch (Exception $e) {
            DB::rollBack();

            return null;
        }
    }

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

    public function StripeSuccess(Request $request)
    {
        $stripe = new StripeClient(config('stripe.stripe_sk'));
        $response = $stripe->checkout->sessions->retrieve($request->session_id);

        if ($response->payment_status == 'paid') {
            $this->saveOrderToDatabase('Stripe');

            return redirect()->route('homePage')->with('success', 'Order placed successfully!');
        }

        return redirect()->route('homePage')->with('error', 'Payment failed.');
    }

    public function StripeCancel(Request $request)
    {
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
            $this->saveOrderToDatabase('PayPal');

            return redirect()->route('homePage')->with('success', 'Order placed successfully!');
        }

        return redirect()->route('homePage')->with('error', 'Payment failed.');
    }

    public function PaypalCancel()
    {
        return redirect()->route('homePage')->with('success', 'Order is canceled.');
    }

    // ====================================
    // ====================================

    private function sslPayment($request, $totalAmount, $orderNumber)
    {
        $response = Sslcommerz::setOrder(
            $totalAmount,                   // Total amount
            $orderNumber,                   // Unique order number
            'E-commerce Products'           // Product category
        )
            ->setCustomer(
                $request->name,                 // Customer name
                $request->email,                // Email
                '01700000000'                   // Phone (request থেকে নিন)
            )
            ->setShippingInfo(
                1,                              // Item quantity
                $request->address               // Customer address
            )
            ->makePayment();

        if ($response->success()) {
            return redirect($response->gatewayPageURL());
        }

        return redirect()->route('homePage')->with('error', 'Payment gateway failed to initialize.');
    }

    // পেমেন্ট সফল হওয়ার মেথড
    public function sslSuccess(Request $request)
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
    public function sslFailure(Request $request)
    {
        Order::where('order_number', $request->input('tran_id'))->update(['status' => 'failed']);

        return redirect()->route('home')->with('error', 'Payment failed.');
    }

    // পেমেন্ট ক্যান্সেল হওয়ার মেথড
    public function sslCancel(Request $request)
    {
        Order::where('order_number', $request->input('tran_id'))->update(['status' => 'cancelled']);

        return redirect()->route('home')->with('error', 'Payment was cancelled.');
    }

    // IPN (Instant Payment Notification) মেথড
    public function sslIpn(Request $request)
    {
        // SSLCommerz থেকে IPN রিকোয়েস্ট হ্যান্ডেল করার জন্য
        return response()->json(['status' => 'success']);
    }
}
