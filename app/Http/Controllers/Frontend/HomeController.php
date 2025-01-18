<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    public function homePage()
    {
        $sliders = Slider::where('status', 1)->latest('id')->get();
        return view('frontend.pages.home_page', compact('sliders'));
    }

    public function productDetails(){
        return view('frontend.pages.product-detail');
    }

    public function productDetail($slug){
        $product=Product::with('brand:id,name','warehouse:id,name','pickup_point:id,name')->where('slug',$slug)->first();
        $related_products=Product::with('category:id,name')->where('sub_category_id',$product->sub_category_id)->inRandomOrder()->take(5)->get();
        return view('frontend.pages.product_detail', compact('product','related_products'));
    }
}
