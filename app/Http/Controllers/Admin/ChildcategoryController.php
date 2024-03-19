<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childategories = Childcategory::with('category:id,category_name', 'subcategory:id,subcategory_name')->select('id', 'childcategory_name', 'childcategory_slug', 'category_id', 'subcategory_id')->latest('id')->get();
        return view('admin.pages.childcategory.index', compact('childategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'category_name')->orderBy('category_name', 'ASC')->get();
        return view('admin.pages.childcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sub_category_name' => 'required|numeric',
            'childcategory_name' => 'required|string|unique:childcategories|max:255',
        ]);

        $category = Subcategory::where('id', $request->sub_category_name)->first();
        Childcategory::create([
            'category_id' => $category->category_id,
            'subcategory_id' => $request->sub_category_name,
            'childcategory_name' => $request->childcategory_name,
            'childcategory_slug' => Str::slug($request->childcategory_name),
        ]);
        Toastr::success('Child category added successfully!');
        return redirect()->route('childcategory.index');
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

        $categories = Category::select('id', 'category_name')->orderBy('category_name', 'ASC')->get();
        $childcategory = Childcategory::findOrFail($id);
        return view('admin.pages.childcategory.edit', compact('childcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'sub_category_name' => 'required|numeric',
            'childcategory_name' => 'required|string|max:255|unique:childcategories,childcategory_name,' . $id,
        ]);
        $category = Subcategory::where('id', $request->sub_category_name)->first();
        $childcategory = Childcategory::findOrFail($id);
        $childcategory->update([
            'category_id' => $category->category_id,
            'subcategory_id' => $request->sub_category_name,
            'childcategory_name' => $request->childcategory_name,
            'childcategory_slug' => Str::slug($request->childcategory_name),
        ]);
        Toastr::success('Child category update successfully!');
        return redirect()->route('childcategory.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childcategory = Childcategory::findOrFail($id);
        $childcategory->delete();
        Toastr::success('Child category deleted successfully!');
        return back();
    }

}
