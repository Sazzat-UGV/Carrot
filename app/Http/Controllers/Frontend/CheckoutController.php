<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
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
        return $request;
        $request->validate([
            'name'         => 'required|string|max:255',
            'phone'        => 'required|string|max:15',
            'address'      => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'postalcode'   => 'required|numeric',
            'country'      => 'required|string|max:255',
            'region_state' => 'nullable|string|max:255',
        ]);
    }
}
