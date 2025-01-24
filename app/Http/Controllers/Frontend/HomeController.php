<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Service;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homePage()
    {
        $sliders       = Slider::where('status', 1)->latest('id')->get();
        $featureds     = Product::with('category:id,name,slug')->withCount('reviews')->withSum('reviews', 'rating')->where('featured', 1)->latest('id')->limit(25)->get();
        $most_populars = Product::with('category:id,name,slug')->withCount('reviews')->withSum('reviews', 'rating')->where('product_view', '!=', 0)->latest('product_view')->take(10)->get();
        $trendies      = Product::with('category:id,name,slug')->withCount('reviews')->withSum('reviews', 'rating')->where('trending', 1)->latest('id')->take(10)->get();
        $services      = Service::where('status', 1)->latest('id')->get();
        $categories    = Category::withCount('products')->where('show_home', 1)->get();
        $brands        = Brand::where('show_home', 1)->latest('id')->get();
        return view('frontend.pages.home_page', compact('sliders', 'featureds', 'services', 'most_populars', 'trendies', 'categories', 'brands'));
    }

    public function productDetails()
    {
        return view('frontend.pages.product-detail');
    }

    public function productDetail($slug)
    {
        $product = Product::with('brand:id,name', 'warehouse:id,name', 'pickup_point:id,name', 'reviews')->withCount('reviews')->withSum('reviews', 'rating')->where('slug', $slug)->first();
        Product::where('slug', $slug)->increment('product_view');
        $related_products = Product::with('category:id,name,slug', 'reviews')->withCount('reviews')->withSum('reviews', 'rating')->where('sub_category_id', $product->sub_category_id)->whereNot('id', $product->id)->take(5)->get();
        $reviews          = Review::with('user:id,name,image')->where('product_id', $product->id)->latest('id')->paginate(10)->appends(['stage' => 'review']);
        return view('frontend.pages.product_detail', compact('product', 'related_products', 'reviews'));
    }

    public function quickView($id)
    {
        $product        = Product::with('reviews')->withCount('reviews')->withSum('reviews', 'rating')->where('id', $id)->first();
        $product->size  = json_decode($product->size, true);
        $product->color = json_decode($product->color, true);
        return response()->json([
            'status'  => true,
            'message' => 'Data retrieve successfully',
            'data'    => $product,
        ]);
    }

    public function allProducts(Request $request, $type, $slug)
    {
        $categories = Category::withCount('products')->where('status', 1)->get();
        $products   = Product::with('category:id,name,slug')->withCount('reviews')->withSum('reviews', 'rating');
        if ($type == 'category') {
            $category = Category::where('slug', $slug)->first()->id;
            $products = $products->where('category_id', $category);
        }
        if ($type == 'subcategory') {
            $subcategory = SubCategory::where('slug', $slug)->first()->id;
            $products    = $products->where('sub_category_id', $subcategory);
        }
        if ($type == 'brand') {
            $brand    = Brand::where('slug', $slug)->first()->id;
            $products = $products->where('brand_id', $brand);
        }

        if ($type == 'filter' && $request->has('category_id') && ! empty($request->category_id)) {
            $products = $products->whereIn('category_id', $request->category_id);
        }
        if ($request->has('color') && is_array($request->color)) {
            $products = $products->where(function ($query) use ($request) {
                foreach ($request->color as $color) {
                    $query->orWhereJsonContains('color', ['value' => $color]);
                }
            });
        }
        if ($request->has('size') && is_array($request->size)) {
            $products = $products->where(function ($query) use ($request) {
                foreach ($request->size as $size) {
                    $query->orWhereJsonContains('size', ['value' => $size]);
                }
            });
        }

        if ($type == 'filter' && $request->has('sort_by')) {
            if ($request->sort_by == 'name_asc') {
                $products = $products->orderBy('name', 'asc');
            }
            if ($request->sort_by == 'name_desc') {
                $products = $products->orderBy('name', 'desc');
            }
            if ($request->sort_by == 'price_asc') {
                $products = $products->orderBy('selling_price', 'asc');
            }
            if ($request->sort_by == 'price_desc') {
                $products = $products->orderBy('selling_price', 'desc');
            }
        }

        $totalProducts = $products->count();
        $products      = $products->paginate(20);

        $sizes = Product::pluck('size')
            ->map(function ($size) {
                $decoded = json_decode($size, true);
                return $decoded;
            })
            ->flatten(1)
            ->pluck('value')
            ->unique()
            ->values();

        $colors = Product::pluck('color')
            ->map(function ($color) {
                $decoded = json_decode($color, true);
                return $decoded;
            })
            ->flatten(1)
            ->pluck('value')
            ->unique()
            ->values();

        return view('frontend.pages.products', compact('products', 'categories', 'sizes', 'colors', 'totalProducts'));
    }
}
