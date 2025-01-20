<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;

class HomeController extends Controller
{
    public function homePage()
    {
        $sliders = Slider::where('status', 1)->latest('id')->get();
        return view('frontend.pages.home_page', compact('sliders'));
    }

    public function productDetails()
    {
        return view('frontend.pages.product-detail');
    }

    public function productDetail($slug)
    {
        $product          = Product::with('brand:id,name', 'warehouse:id,name', 'pickup_point:id,name', 'reviews')->withCount('reviews')->withSum('reviews', 'rating')->where('slug', $slug)->first();
        $related_products = Product::with('category:id,name', 'reviews')->withCount('reviews')->withSum('reviews', 'rating')->where('sub_category_id', $product->sub_category_id)->whereNot('id', $product->id)->inRandomOrder()->take(5)->get();
        $reviews          = Review::with('user:id,name,image')->where('product_id', $product->id)->latest('id')->paginate(10)->appends(['stage' => 'review']);
        return view('frontend.pages.product_detail', compact('product', 'related_products', 'reviews'));
    }

}
