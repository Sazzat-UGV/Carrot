<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        return view('backend.pages.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $brand = Brand::create([
            'name' => $request->brand_name,
            'slug' => Str::slug($request->brand_name),
        ]);
        $this->image_upload($request->photo, $brand);
        return redirect()->route('admin.brand.index')->with('success', 'Brand added successfully');
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
        return view('backend.pages.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255',
            'photo' => 'sometimes|image|mimes:png,jpg,jpeg',
        ]);
        $brand = Brand::findOrFail($id);
        $brand->update([
            'name' => $request->brand_name,
            'slug' => Str::slug($request->brand_name),
        ]);
        if ($request->hasFile('photo')) {
            $this->image_upload($request->photo, $brand);
        }
        return redirect()->route('admin.brand.index')->with('success', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $old_photo_path = base_path('public/uploads/brand/' . $brand->photo);
        if ($brand->photo && File::exists($old_photo_path) && !is_dir($old_photo_path)) {
            File::delete($old_photo_path);
        }
        $brand->delete();
        return redirect()->route('admin.brand.index')->with('success', 'Brand deleted successfully');
    }

    public function image_upload($uploaded_photo, $brand)
    {
        $brand = Brand::findOrFail($brand->id);
        $old_photo_path = base_path('public/uploads/brand/' . $brand->photo);
        if ($brand->photo && File::exists($old_photo_path) && !is_dir($old_photo_path)) {
            File::delete($old_photo_path);
        }
        $photo_location = 'public/uploads/brand/';
        $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
        $new_photo_path = base_path($photo_location . $new_photo_name);

        Image::make($uploaded_photo)->save($new_photo_path);
        $brand->update([
            'photo' => $new_photo_name,
        ]);
    }
}
