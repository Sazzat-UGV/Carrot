<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function checkoutPage()
    {
        $cart_items = Cart::content();
        return view('frontend.pages.checkout', compact('cart_items'));
    }
}
