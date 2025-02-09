<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\PickupPoint;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Warehouse;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total_category           = Category::count();
        $total_active_category    = Category::where('status', 1)->count();
        $total_subcategory        = SubCategory::count();
        $total_active_subcategory = SubCategory::where('status', 1)->count();
        $total_brand              = Brand::count();
        $total_warehouse          = Warehouse::count();
        $active_coupon            = Coupon::where('status', 1)->count();
        $total_pickup_point       = PickupPoint::count();
        $total_product            = Product::count();
        $total_active_product     = Product::where('status', 1)->count();
        $total_campaign           = Campaign::count();
        $total_active_campaign    = Campaign::where('status', 1)->count();
        $total_blog               = Blog::count();
        $total_active_blog        = Blog::where('status', 1)->count();
        $total_user               = User::where('role', 'User')->count();
        $total_active_user        = User::where('role', 'User')->where('status', 1)->count();
        $total_order              = Order::count();

        return view('backend.pages.dashboard', compact([
            'total_category',
            'total_active_category',
            'total_subcategory',
            'total_active_subcategory',
            'total_brand',
            'total_warehouse',
            'active_coupon',
            'total_pickup_point',
            'total_product',
            'total_active_product',
            'total_campaign',
            'total_active_campaign',
            'total_blog',
            'total_active_blog',
            'total_user',
            'total_active_user',
            'total_order',
        ]));
    }
}
