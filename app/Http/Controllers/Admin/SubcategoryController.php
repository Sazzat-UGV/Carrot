<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::with('category:id,category_name')->select('id', 'subcategory_name', 'subcategory_slug', 'category_id')->latest('id')->get();
        return view('admin.pages.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest('id')->select('id', 'category_name')->get();
        return view('admin.pages.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'category_name' => 'required|numeric',
            'subcategory_name' => 'required|string|max:255|unique:subcategories,subcategory_name',
        ]);

        Subcategory::create([
            'category_id' => $request->category_name,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name),
        ]);
        Toastr::success('Sub category added successfully!');
        return redirect()->route('subcategory.index');
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
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::latest('id')->select('id', 'category_name')->get();
        return view('admin.pages.subcategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'category_name' => 'required|numeric',
            'subcategory_name' => 'required|string|max:255|unique:subcategories,subcategory_name,' . $id,
        ]);
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update([
            'category_id' => $request->category_name,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name),
        ]);
        Toastr::success('Sub category update successfully!');
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        Toastr::success('Sub category deleted successfully!');
        return back();
    }
}
