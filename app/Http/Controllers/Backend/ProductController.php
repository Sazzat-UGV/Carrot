<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\PickupPoint;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::with('category:id,name', 'subcategory:id,name', 'brand:id,name')->latest('id')->paginate(10);
        return view('backend.pages.product.index', compact('products'));
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
            'product_name'      => 'required|string|max:255',
            'product_code'      => 'required|string|max:255',
            'category'          => 'required|numeric',
            'brand'             => 'required|numeric',
            'warehouse'         => 'required|numeric',
            'pickup_point'      => 'nullable|numeric',
            'unit'              => 'required|string',
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
            'code'            => $request->product_code,
            'user_id'         => Auth::user()->id,
            'category_id'     => $request->category,
            'sub_category_id' => $request->category,
            'brand_id'        => $request->brand,
            'Warehouse_id'    => $request->warehouse,
            'pickup_point_id' => $request->pickup_point,
            'unit'            => $request->unit,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
        $images = [];
        if ($request->hasFile('multiple_images')) {
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
            'type' => 'success',
            'message' => 'Status Updated',
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
            'type' => 'success',
            'message' => 'Status Updated',
        ]);
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
            'type' => 'success',
            'message' => 'Status Updated',
        ]);
    }

}
