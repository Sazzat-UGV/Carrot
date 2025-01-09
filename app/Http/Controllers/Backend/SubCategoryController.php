<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::with('category')->latest('id')->get();
        return view('backend.pages.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|numeric',
            'subcategory_name' => 'required|string|unique:sub_categories,name|max:255',
        ]);
        SubCategory::create([
            'category_id' => $request->category,
            'name' => $request->subcategory_name,
            'slug' => Str::slug($request->subcategory_name),
        ]);
        return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory added successfully.');
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
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.subcategory.edit', compact('categories', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $request->validate([
            'category' => 'required|numeric',
            'subcategory_name' => 'required|string|max:255|unique:sub_categories,name,' . $subcategory->id,
        ]);
        $subcategory->update([
            'category_id' => $request->category,
            'name' => $request->subcategory_name,
            'slug' => Str::slug($request->subcategory_name),
        ]);
        return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        return back()->with('success', 'Subcategory deleted successfully.');
    }

    public function changeStatus($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        if ($subcategory->status == 1) {
            $subcategory->status = 0;
        } else {
            $subcategory->status = 1;
        }
        $subcategory->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Status Updated',
        ]);
    }
}
// $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
// $table->string('name');
// $table->string('slug');
// $table->boolean('status')->default(1);
