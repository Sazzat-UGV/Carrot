<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $products = Product::with('wishlists', 'category:id,name', 'reviews')->withCount('reviews')->withSum('reviews', 'rating')->whereHas('wishlists', function ($q) {
            $q->where('user_id', Auth::user()->id);
        })->paginate(8);
        return view('frontend.pages.profile.wishlist', compact('products'));
    }

    public function store(Request $request, $id)
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $id)->first();

        if ($wishlist) {
            $wishlist->delete();
            return redirect()->back()->with('success', 'Product removed from wishlist.');
        }
        Wishlist::create([
            'user_id'    => Auth::user()->id,
            'product_id' => $id,
        ]);
        return redirect()->back()->with('success', 'Product added to wishlist.');
    }
}
