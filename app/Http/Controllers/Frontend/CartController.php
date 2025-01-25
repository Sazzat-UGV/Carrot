<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart    = Cart::add(
            ['id'     => $product->id,
                'name'    => $product->name,
                'qty'     => $request->qty,
                'price'   => $request->price,
                'weight'  => 1,
                'options' => [
                    'size'      => $request->size,
                    'color'     => $request->color,
                    'thumbnail' => $product->thumbnail,
                ]]);
        return response()->json([
            'status'  => true,
            'message' => 'Product Added Successfully',
            'data'    => $cart,
        ]);
    }

    public function myCart()
    {
        Cart::setGlobalTax(0);
        $cart_content = Cart::content();
        return view('frontend.pages.profile.cart', compact('cart_content'));
    }

    public function removeSingleItem($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success', 'Product removed from cart.');
    }
}
