<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    // public function index(){
    //     $wishlists=Wishlist::with('product')->where('user_id',Auth::user()->id)->paginate(8);
    //     return $wishlists;
    //     return view('frontend.pages.dashboard.wishlist',compact('wishlists'));
    // }

}
