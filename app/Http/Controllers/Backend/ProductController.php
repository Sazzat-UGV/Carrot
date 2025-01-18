<?php
namespace App\Http\Controllers\Backend;

use Image;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Warehouse;
use App\Models\PickupPoint;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::latest()->get();
        $brands     = Brand::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $products   = Product::with('category:id,name', 'subcategory:id,name', 'brand:id,name')->latest('id');
        if ($request->category) {
            $products = $products->where('category_id', $request->category);
        }
        if ($request->brand) {
            $products = $products->where('brand_id', $request->brand);
        }
        if ($request->warehouse) {
            $products = $products->where('warehouse_id', $request->warehouse);
        }
        if ($request->status == 'active' || $request->status == 'inactive') {
            if ($request->status == 'active') {
                $status = 1;
            } else {
                $status = 0;
            }
            $products = $products->where('status', $status);
        }
        if ($request->search) {
            $products = $products->where('name', 'LIKE', '%' . $request->search . '%');
        }
        $products = $products->paginate(10);
        return view('backend.pages.product.index', compact('products', 'categories', 'brands', 'warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories    = Category::where("status", 1)->latest("id")->get();
        $brands        = Brand::latest("id")->get();
        $pickup_points = PickupPoint::latest("id")->get();
        $warehouses    = Warehouse::latest("id")->get();
        return view('backend.pages.product.create', compact('categories', 'brands', 'pickup_points', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'      => 'required|string|max:255|unique:products,name',
            'product_code'      => 'required|string|max:255',
            'category'          => 'required|numeric',
            'brand'             => 'required|numeric',
            'warehouse'         => 'required|numeric',
            'pickup_point'      => 'nullable|numeric',
            'purchase_price'    => 'nullable|numeric',
            'selling_price'     => 'required|numeric',
            'discount_price'    => 'nullable|numeric',
            'description'       => 'required|string',
            'thumbnail'         => 'required|image|mimes:png,jpg,jpeg|max:10240',
            'multiple_images'   => 'sometimes|array',
            'multiple_images.*' => 'image|mimes:png,jpg,jpeg|max:10240',
        ]);
        $product = Product::create([
            'name'            => $request->product_name,
            'slug'=>Str::slug($request->product_name),
            'code'            => $request->product_code,
            'user_id'         => Auth::user()->id,
            'category_id'     => $request->category,
            'sub_category_id' => $request->subcategory,
            'brand_id'        => $request->brand,
            'warehouse_id'    => $request->warehouse,
            'pickup_point_id' => $request->pickup_point,
            'tags'            => $request->tags,
            'purchase_price'  => $request->purchase_price,
            'selling_price'   => $request->selling_price,
            'discount_price'  => $request->discount_price,
            'color'           => $request->color,
            'size'            => $request->size,
            'stock_quantity'  => $request->stock,
            'description'     => $request->description,
            'video'           => $request->embeded_video,
            'featured'        => $request->featured,
            'today_deal'      => $request->today_deal,
            'status'          => $request->status,
        ]);

        $this->image_upload($request, $product);
        if ($request->hasFile('multiple_images')) {
            $this->multiple_images_upload($request, $product);
        }
        return redirect()->route('admin.product.index')->with('success', 'Product added successfully.');

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
        $categories    = Category::where("status", 1)->latest("id")->get();
        $brands        = Brand::latest("id")->get();
        $pickup_points = PickupPoint::latest("id")->get();
        $warehouses    = Warehouse::latest("id")->get();
        $product       = Product::findOrFail($id);
        return view('backend.pages.product.edit', compact('categories', 'brands', 'pickup_points', 'warehouses', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'product_name'      => 'required|string|max:255|unique:products,name,'.$product->id,
            'product_code'      => 'required|string|max:255',
            'category'          => 'required|numeric',
            'brand'             => 'required|numeric',
            'warehouse'         => 'required|numeric',
            'pickup_point'      => 'nullable|numeric',
            'purchase_price'    => 'nullable|numeric',
            'selling_price'     => 'required|numeric',
            'discount_price'    => 'nullable|numeric',
            'description'       => 'required|string',
            'thumbnail'         => 'sometimes|image|mimes:png,jpg,jpeg|max:10240',
            'multiple_images'   => 'sometimes|array',
            'multiple_images.*' => 'image|mimes:png,jpg,jpeg|max:10240',
        ]);
        $product->update([
            'name'            => $request->product_name,
               'slug'=>Str::slug($request->product_name),
            'code'            => $request->product_code,
            'user_id'         => Auth::user()->id,
            'category_id'     => $request->category,
            'sub_category_id' => $request->subcategory ?? $product->sub_category_id,
            'brand_id'        => $request->brand,
            'warehouse_id'    => $request->warehouse,
            'pickup_point_id' => $request->pickup_point,
            'tags'            => $request->tags,
            'purchase_price'  => $request->purchase_price,
            'selling_price'   => $request->selling_price,
            'discount_price'  => $request->discount_price,
            'color'           => $request->color,
            'size'            => $request->size,
            'stock_quantity'  => $request->stock,
            'description'     => $request->description,
            'video'           => $request->embeded_video,
            'featured'        => $request->featured,
            'today_deal'      => $request->today_deal,
            'status'          => $request->status,
        ]);

        if ($request->hasFile('thumbnail')) {
            $this->image_upload($request, $product);
        }
        if ($request->hasFile('multiple_images')) {
            $this->multiple_images_upload($request, $product);
        }
        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product->thumbnail) {
            $this->deleteImages($product->thumbnail);
        }

        if ($product->images) {
            $images = json_decode($product->images, true);
            $this->deleteImages($images);
        }
        $product->delete();
        return back()->with('success', 'Product deleted successfully.');
    }

    public function image_upload($request, $product)
    {
        $uploaded_photo = $request->file('thumbnail');
        $product        = Product::findOrFail($product->id);
        $old_photo_path = base_path('public/uploads/product/' . $product->thumbnail);
        if ($product->thumbnail && File::exists($old_photo_path) && ! is_dir($old_photo_path)) {
            File::delete($old_photo_path);
        }
        $photo_location = 'public/uploads/product/';
        $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
        $new_photo_path = base_path($photo_location . $new_photo_name);

        Image::make($uploaded_photo)->save($new_photo_path);
        $product->update([
            'thumbnail' => $new_photo_name,
        ]);
    }

    public function multiple_images_upload(Request $request, $product)
    {
        $currentImages = json_decode($product->images, true);
        if ($currentImages) {
            $this->deleteImages($currentImages);
        }
        $images = [];

        if ($request->hasFile('multiple_images')) {
            // Loop through the uploaded images
            foreach ($request->file('multiple_images') as $image) {
                $photo_location = 'public/uploads/product/';
                $photo_name     = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $photo_path     = $photo_location . $photo_name;
                Image::make($image)->save(base_path($photo_path));
                $images[] = $photo_name;
            }
            $product->update([
                'images' => json_encode($images),
            ]);
        }
    }

    public function featured($id)
    {
        $product = Product::findOrFail($id);
        if ($product->featured == 1) {
            $product->featured = 0;
        } else {
            $product->featured = 1;
        }
        $product->update();
        return response()->json([
            'type'    => 'success',
            'message' => 'Featured Updated',
        ]);
    }
    public function todayDeal($id)
    {
        $product = Product::findOrFail($id);
        if ($product->today_deal == 1) {
            $product->today_deal = 0;
        } else {
            $product->today_deal = 1;
        }
        $product->update();
        return response()->json([
            'type'    => 'success',
            'message' => 'Today Deal Updated',
        ]);
    }
    public function changeStatus($id)
    {
        $product = Product::findOrFail($id);
        if ($product->status == 1) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }
        $product->update();
        return response()->json([
            'type'    => 'success',
            'message' => 'Status Updated',
        ]);
    }

    public function subCategory($id)
    {
        $subcategories = SubCategory::where('category_id', $id)->get();
        return response()->json([
            'status'        => true,
            'message'       => 'Subcategory retrieve successfully.',
            'subcategories' => $subcategories,
        ]);
    }

    public function deleteImages($paths)
    {
        $paths = is_array($paths) ? $paths : [$paths];

        foreach ($paths as $path) {
            $fullPath = base_path('public/uploads/product/' . $path);

            if (File::exists($fullPath) && ! is_dir($fullPath)) {
                File::delete($fullPath);
            }
        }
    }
}
