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
            'message' => 'Product added to cart',
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

    public function deleteCart()
    {
        Cart::destroy();
        return back()->with('success', 'Cart deleted successfully.');
    }

    public function updateItemColor($color, $rowId)
    {
        $existing_data = Cart::get($rowId);
        $cart          = Cart::update($rowId,
            ['id'     => $existing_data->id,
                'name'    => $existing_data->name,
                'qty'     => $existing_data->qty,
                'price'   => $existing_data->price,
                'weight'  => 1,
                'options' => [
                    'size'      => $existing_data->options->size,
                    'color'     => $color,
                    'thumbnail' => $existing_data->options->thumbnail,
                ]]);
        return response()->json([
            'status'  => true,
            'message' => 'Color updated Successfully',
            'data'    => $cart,
        ]);
    }
    public function updateItemSize($size, $rowId)
    {
        $existing_data = Cart::get($rowId);
        $cart          = Cart::update($rowId,
            ['id'     => $existing_data->id,
                'name'    => $existing_data->name,
                'qty'     => $existing_data->qty,
                'price'   => $existing_data->price,
                'weight'  => 1,
                'options' => [
                    'size'      => $size,
                    'color'     => $existing_data->options->color,
                    'thumbnail' => $existing_data->options->thumbnail,
                ]]);
        return response()->json([
            'status'  => true,
            'message' => 'Size updated Successfully',
            'data'    => $cart,
        ]);
    }
    public function updateItemQty($qty, $rowId)
    {
        $existing_data = Cart::get($rowId);
        $cart          = Cart::update($rowId,
            ['id'     => $existing_data->id,
                'name'    => $existing_data->name,
                'qty'     => $qty,
                'price'   => $existing_data->price,
                'weight'  => 1,
                'options' => [
                    'size'      => $existing_data->options->size,
                    'color'     => $existing_data->options->color,
                    'thumbnail' => $existing_data->options->thumbnail,
                ]]);
        return response()->json([
            'status'  => true,
            'message' => 'Quantity updated Successfully',
            'data'    => $cart,
        ]);
    }
}
