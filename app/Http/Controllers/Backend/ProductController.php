<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PickupPoint;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::where("status",1)->latest("id")->get();
        $brands=Brand::latest("id")->get();
        $pickup_points=PickupPoint::latest("id")->get();
        return view('backend.pages.product.create',compact('categories','brands','pickup_points'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'product_name'=>'required|string|max:255',
        'product_code'=>'required|string|max:255',
        'category'=>'required|numeric',
        'brand'=>'required|numeric',
        'pickup_point'=>'nullable|numeric',
        'unit'=>'required|string'
      ]);
      Product::create([
        'name'=>$request->product_name,
        'code'=>$request->product_code,
        'user_id'=>Auth::user()->id,
        'category_id'=>$request->category,
        'brand_id'=>$request->brand,
        'pickup_point_id'=>$request->pickup_point,
        'unit'=>$request->unit,
      ]);
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
}
