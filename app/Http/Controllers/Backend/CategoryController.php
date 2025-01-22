<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest('id')->get();
        return view('backend.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|unique:categories,name|max:255',
            'category_icon' => 'required|string|max:255',
        ]);
        Category::create([
            'icon' => $request->category_icon,
            'name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Category added successfully.');
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
        $category = Category::findOrFail($id);
        return view('backend.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'category_icon' => 'required|string|max:255',
        ]);
        $category->update([
            'icon' => $request->category_icon,
            'name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->with('success', 'Category deleted successfully.');
    }

    public function changeStatus($id)
    {
        $category = Category::findOrFail($id);
        if ($category->status == 1) {
            $category->status = 0;
        } else {
            $category->status = 1;
        }
        $category->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Status Updated',
        ]);
    }
    public function showHome($id)
    {
        $category = Category::findOrFail($id);
        if ($category->show_home == 1) {
            $category->show_home = 0;
        } else {
            $category->show_home = 1;
        }
        $category->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Status Updated',
        ]);
    }
}
