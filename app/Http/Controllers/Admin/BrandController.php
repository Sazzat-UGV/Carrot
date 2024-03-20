<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest('id')->get();
        return view('admin.pages.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'brand_name' => 'required|string|max:255|unique:brands',
            'status' => 'required|numeric',
            'image' => 'required|mimes:png,jpg|max:10240',
        ]);
        $brand = Brand::create([
            'brand_name' => $request->brand_name,
            'brand_slug' => Str::slug($request->brand_name),
            'is_active' => $request->status,
        ]);
        if ($request->hasFile('image')) {
            $photo_loation = 'public/uploads/brand_logo/';
            $uploaded_photo = $request->file('image');
            $new_photo_name = $request->brand_name . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            $status = Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $brand->update([
                'brand_logo' => $new_photo_name,
            ]);
        }
        Toastr::success('Brand added successfully!');
        return redirect()->route('brand.index');
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
        $brand = Brand::findOrFail($id);
        return view('admin.pages.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'brand_name' => 'required|string|max:255|unique:brands,brand_name,' . $id,
            'status' => 'required|numeric',
            'image' => 'nullable|mimes:png,jpg|max:10240',
        ]);
        $brand = Brand::findOrFail($id);
        $brand->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => Str::slug($request->brand_name),
            'is_active' => $request->status,
        ]);
        if ($request->hasFile('image')) {
            // delete old image
            $photo_location = 'public/uploads/brand_logo/';
            $old_photo_name = $brand->brand_logo;
            $old_photo_path = public_path($photo_location . $old_photo_name);

            if (file_exists($old_photo_path)) {
                unlink($old_photo_path);
            }

            $photo_loation = 'public/uploads/brand_logo/';
            $uploaded_photo = $request->file('image');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            $status = Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $brand->update([
                'brand_logo' => $new_photo_name,
            ]);
        }
        Toastr::success('Brand update successfully!');
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        Toastr::success('Brand delete successfully!');
        return redirect()->route('brand.index');
    }

    public function changeStatus($id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand->is_active == 1) {
            $status = 0;
        }
        if ($brand->is_active == 0) {
            $status = 1;
        }
        $brand->update([
            'is_active' => $status,
        ]);
        return response()->json(200);
    }
}
