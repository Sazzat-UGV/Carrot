<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest('id')->get();
        return view('backend.pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description'       => 'required|string|max:10000',
            'image'             => 'required|image|mimes:png,jpg,jpeg|max:10240',
        ]);
        $blog = Blog::create([
            'creator_id'        => Auth::id(),
            'title'             => $request->title,
            'slug'              => Str::slug($request->title),
            'short_description' => $request->short_description,
            'description'       => $request->description,
        ]);
        $this->image_upload($request, $blog);
        return redirect()->route('admin.blog.index')->with('success', 'Blog added successfully.');
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
        $blog = Blog::findOrFail($id);
        return view('backend.pages.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description'       => 'required|string|max:10000',
            'image'             => 'sometimes|image|mimes:png,jpg,jpeg|max:10240',
        ]);
        $blog = Blog::findOrFail($id);
        $blog->update([
            'title'             => $request->title,
            'slug'              => Str::slug($request->title),
            'short_description' => $request->short_description,
            'description'       => $request->description,
        ]);
        $this->image_upload($request, $blog);
        return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog           = Blog::findOrFail($id);
        $old_photo_path = base_path('public/uploads/blog/' . $blog->image);
        File::delete($old_photo_path);
        $blog->delete();
        return back()->with('success', 'Blog deleted successfully.');
    }

    public function changeStatus($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->status == 1) {
            $blog->status = 0;
        } else {
            $blog->status = 1;
        }
        $blog->update();
        return response()->json([
            'type'    => 'success',
            'message' => 'Status Updated',
        ]);
    }

    public function image_upload($request, $blog)
    {
        $uploaded_photo = $request->file('image');
        $blog           = Blog::findOrFail($blog->id);
        $old_photo_path = base_path('public/uploads/blog/' . $blog->image);
        if ($blog->image && File::exists($old_photo_path) && ! is_dir($old_photo_path)) {
            File::delete($old_photo_path);
        }
        $photo_location = 'public/uploads/blog/';
        $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
        $new_photo_path = base_path($photo_location . $new_photo_name);

        Image::make($uploaded_photo)->save($new_photo_path);
        $blog->update([
            'image' => $new_photo_name,
        ]);
    }
}
