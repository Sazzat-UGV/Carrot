<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Campaign;
use App\Models\CampaignProduct;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\Product;
use App\Models\Review;
use App\Models\Service;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function homePage()
    {
        $sliders       = Slider::where('status', 1)->latest('id')->get();
        $featureds     = Product::with('category:id,name,slug')->withCount('reviews')->withSum('reviews', 'rating')->where('status', 1)->where('featured', 1)->latest('id')->limit(25)->get();
        $most_populars = Product::with('category:id,name,slug')->withCount('reviews')->withSum('reviews', 'rating')->where('status', 1)->where('product_view', '!=', 0)->latest('product_view')->take(10)->get();
        $trendies      = Product::with('category:id,name,slug')->withCount('reviews')->withSum('reviews', 'rating')->where('status', 1)->where('trending', 1)->latest('id')->take(10)->get();
        $services      = Service::where('status', 1)->latest('id')->get();
        $categories    = Category::withCount('products')->where('show_home', 1)->get();
        $brands        = Brand::where('show_home', 1)->latest('id')->get();
        $today_deals   = Product::with('category:id,name,slug')->withCount('reviews')->withSum('reviews', 'rating')->where('status', 1)->where('today_deal', 1)->latest('id')->take(10)->get();
        $campaign      = Campaign::where('status', 1)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->first();

        return view('frontend.pages.home_page', compact('sliders', 'featureds', 'services', 'most_populars', 'trendies', 'categories', 'brands', 'today_deals', 'campaign'));
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

    public function privacyPolicy()
    {
        $page = Page::where('id', 1)->first();
        return view('frontend.pages.privacy_policy', compact('page'));
    }
    public function TermsCondition()
    {
        $page = Page::where('id', 1)->first();
        return view('frontend.pages.terms_condition', compact('page'));
    }

    public function newsLetter(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $news_letter = Newsletter::where('email', $request->email)->first();
        if ($news_letter) {
            return back()->with('error', 'You already subscribe with this email.');
        }
        Newsletter::create([
            'email' => $request->email, 0,
        ]);
        return back()->with('success', 'You have successfully subscribed to the newsletter.');
    }

    public function campaign($campaign_id)
    {
        $campaign             = Campaign::findOrFail($campaign_id);
        $campaign_product_ids = CampaignProduct::where('campaign_id', $campaign->id)->pluck('product_id');
        $products             = Product::with(['category:id,name,slug'])
            ->withCount('reviews')
            ->withSum('reviews', 'rating')
            ->whereIn('id', $campaign_product_ids)
            ->latest('id')
            ->paginate(30);

        foreach ($products as $product) {
            $campaignProduct = CampaignProduct::where('product_id', $product->id)
                ->where('campaign_id', $campaign->id)
                ->first();
            $product->discount_price = $product->selling_price;
            $product->selling_price  = $campaignProduct ? $campaignProduct->price : null;
        }

        return view('frontend.pages.campaign', compact('products', 'campaign'));
    }
    public function campaignProductDetail($campaign_id, $product_id)
    {
        $campaign_data = CampaignProduct::where('campaign_id', $campaign_id)->where('product_id', $product_id)->first();
        $product       = Product::with('brand:id,name', 'warehouse:id,name', 'pickup_point:id,name', 'reviews')->withCount('reviews')->withSum('reviews', 'rating')
            ->where('id', $product_id)
            ->first();
        $product->discount_price = $product->selling_price;
        $product->selling_price  = $campaign_data ? $campaign_data->price : null;

        Product::where('id', $product_id)->increment('product_view');
        $related_products = Product::with('category:id,name,slug', 'reviews')->withCount('reviews')->withSum('reviews', 'rating')->where('sub_category_id', $product->sub_category_id)->whereNot('id', $product->id)->take(5)->get();
        $reviews          = Review::with('user:id,name,image')->where('product_id', $product->id)->latest('id')->paginate(10)->appends(['stage' => 'review']);
        return view('frontend.pages.campaign_product_detail', compact('reviews', 'related_products', 'product'));
    }

    public function contactUs()
    {
        return view('frontend.pages.contact_us');
    }

    public function contactUsSubmit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'phone'   => 'required|string',
            'message' => 'required|string',
        ]);
        $name         = $request->name;
        $email        = $request->email;
        $phone        = $request->phone;
        $mail_message = $request->message;
        $admin        = User::where('id', 1)->first();
        Mail::to($admin->email)->send(new ContactUsMail($name, $email, $phone, $mail_message));
        return back()->with('success', 'Contact us form submitted successfully.');
    }

    public function blogList()
    {
        $blogs = Blog::with('user')->latest('id')->where('status', 1)->paginate(6);
        return view('frontend.pages.blog.index', compact('blogs'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('frontend.pages.blog.show', compact('blog'));
    }

    public function faq()
    {
        $faqs = Faq::latest('id')->get();
        return view('frontend.pages.faq', compact('faqs'));
    }
}
