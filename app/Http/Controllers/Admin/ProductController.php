<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\PickupPoint;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Warehouse;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category:id,category_name', 'subcategory:id,subcategory_name', 'brand:id,brand_name')->select('id', 'thumbnail', 'product_name', 'product_code', 'category_id', 'subcategory_id', 'brand_id', 'featured_product', 'today_deal', 'status')->latest('id')->get();
        $categories = Category::all();
        $brands = Brand::all();
        $warehouses = Warehouse::all();
        return view('admin.pages.product.index', compact('products', 'categories', 'brands', 'warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'category_name')->latest()->get();
        $brands = Brand::latest()->get();
        $pickup_points = PickupPoint::latest('id')->get();
        $warehouses = Warehouse::latest()->get();
        return view('admin.pages.product.create', compact('categories', 'brands', 'pickup_points', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|unique:products|max:55',
            'subcategory' => 'required|numeric',
            'child_category' => 'nullable|numeric',
            'brand' => 'required|numeric',
            'pickup_point' => 'nullable|numeric',
            'unit' => 'required',
            'product_tags' => 'nullable|string',
            'purchase_price' => 'nullable|string',
            'selling_price' => 'required|string',
            'discount_price' => 'nullable|string',
            'warehouse' => 'required|numeric',
            'stock' => 'nullable|string',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'product_details' => 'nullable|string|max:7000',
        ]);

        $category = Subcategory::where('id', $request->subcategory)->first()->category_id;
        $product = Product::create([
            'category_id' => $category,
            'subcategory_id' => $request->subcategory,
            'childcategory_id' => $request->child_category,
            'brand_id' => $request->brand,
            'warehouse_id' => $request->warehouse,
            'pickup_point_id' => $request->pickup_point,
            'admin_id' => Auth::user()->id,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),
            'product_code' => $request->product_code,
            'unit' => $request->unit,
            'product_tags' => $request->product_tags,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'color' => $request->color,
            'size' => $request->size,
            'stock' => $request->stock,
            'product_details' => $request->product_details,
            'video_embed_code' => $request->video_embed_code,
            'featured_product' => filled($request->featured_product),
            'today_deal' => filled($request->today_deal),
            'status' => filled($request->status),
            'date' => date('d-m-Y'),
            'month' => date('F'),
        ]);
        $slug = Str::slug($request->product_name);

        if ($request->thumbnail) {
            $photo_loation = 'public/uploads/product/';
            $thumbnail = $request->thumbnail;
            $photoname = $slug . '.' . $thumbnail->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $photoname;
            $status = Image::make($thumbnail)->resize(600, 600)->save(base_path($new_photo_location));
            $product->update([
                'thumbnail' => $photoname,
            ]);
        };
        if ($request->hasFile('multiple_image')) {
            $images = [];
            foreach ($request->file('multiple_image') as $key => $image) {
                $photo_location = 'public/uploads/product/';
                $photoname = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $new_photo_location = $photo_location . $photoname;
                $status = \Image::make($image)->resize(600, 600)->save(base_path($new_photo_location));
                $images[] = $photoname;
            }
            $product->multiple_image = json_encode($images);
            $product->save();
        }

        Toastr::success('Product added successfully!');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::select('id', 'category_name')->latest()->get();
        $brands = Brand::latest()->get();
        $pickup_points = PickupPoint::latest('id')->get();
        $warehouses = Warehouse::latest()->get();
        return view('admin.pages.product.edit', compact('product', 'categories', 'brands', 'warehouses', 'pickup_points'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:55|unique:products,product_code,' . $id,
            'subcategory' => 'required|numeric',
            'child_category' => 'nullable|numeric',
            'brand' => 'required|numeric',
            'pickup_point' => 'nullable|numeric',
            'unit' => 'required',
            'product_tags' => 'nullable|string',
            'purchase_price' => 'nullable|string',
            'selling_price' => 'required|string',
            'discount_price' => 'nullable|string',
            'warehouse' => 'required|numeric',
            'stock' => 'nullable|string',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'product_details' => 'nullable|string|max:7000',
        ]);
        $product = Product::findOrFail($id);
        $category = Subcategory::where('id', $request->subcategory)->first()->category_id;
        $product->update([
            'category_id' => $category,
            'subcategory_id' => $request->subcategory,
            'childcategory_id' => $request->child_category,
            'brand_id' => $request->brand,
            'warehouse_id' => $request->warehouse,
            'pickup_point_id' => $request->pickup_point,
            'admin_id' => Auth::user()->id,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),
            'product_code' => $request->product_code,
            'unit' => $request->unit,
            'product_tags' => $request->product_tags,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'color' => $request->color,
            'size' => $request->size,
            'stock' => $request->stock,
            'product_details' => $request->product_details,
            'video_embed_code' => $request->video_embed_code,
            'featured_product' => filled($request->featured_product),
            'today_deal' => filled($request->today_deal),
            'status' => filled($request->status),
            'date' => date('d-m-Y'),
            'month' => date('F'),
        ]);
        $slug = Str::slug($request->product_name);

        if ($request->thumbnail) {
            $photo_loation = 'public/uploads/product/';
            $thumbnail = $request->thumbnail;
            $photoname = $slug . '.' . $thumbnail->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $photoname;
            $status = Image::make($thumbnail)->resize(600, 600)->save(base_path($new_photo_location));
            $product->update([
                'thumbnail' => $photoname,
            ]);
        };
        if ($request->hasFile('multiple_image')) {
            $images = [];
            foreach ($request->file('multiple_image') as $key => $image) {
                $photo_location = 'public/uploads/product/';
                $photoname = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $new_photo_location = $photo_location . $photoname;
                $status = \Image::make($image)->resize(600, 600)->save(base_path($new_photo_location));
                $images[] = $photoname;
            }
            $product->multiple_image = json_encode($images);
            $product->save();
        }

        Toastr::success('Product updated successfully!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $photoname = $product->thumbnail;
        $photo_location = public_path('uploads/product/' . $photoname);
        if (file_exists($photo_location)) {
            unlink($photo_location);
        }
        $photonames = json_decode($product->multiple_image, true);
        if ($photonames) {
            foreach ($photonames as $name) {
                $single_photo_location = public_path('uploads/product/' . $name);
                unlink($single_photo_location);
            }
        }
        Toastr::success('Product deleted successfully!');
        $product->delete();
        return back();
    }

    public function getChildCategory($id)
    {
        $childcategories = Childcategory::where('subcategory_id', $id)->select('id', 'childcategory_name')->get();
        return response()->json($childcategories, 200);
    }

    public function featuredUpdate($id)
    {
        $product = Product::findOrFail($id);
        if ($product->featured_product == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $product->update([
            'featured_product' => $status,
        ]);
        return response()->json(200);
    }

    public function todayDealUpdate($id)
    {
        $product = Product::findOrFail($id);
        if ($product->today_deal == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $product->update([
            'today_deal' => $status,
        ]);
        return response()->json(200);
    }

    public function statusUpdate($id)
    {
        $product = Product::findOrFail($id);
        if ($product->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $product->update([
            'status' => $status,
        ]);
        return response()->json(200);
    }

}
