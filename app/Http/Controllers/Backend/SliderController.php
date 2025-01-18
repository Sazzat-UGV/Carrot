<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest('id')->get();
        return view('backend.pages.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'heading'     => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'button_name' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
            'image'       => 'required|image|mimes:png,jpg,jpeg|max:10240',
        ]);
        $slider = Slider::create([
            'title'       => $request->title,
            'heading'     => $request->heading,
            'description' => $request->description,
            'button_name' => $request->button_name,
            'button_link' => $request->button_link,
        ]);
        $this->image_upload($request, $slider);
        return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully.');
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
        $slider = Slider::findOrFail($id);
        return view('backend.pages.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'heading'     => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'button_name' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
            'image'       => 'sometimes|image|mimes:png,jpg,jpeg|max:10240',
        ]);
        $slider = Slider::findOrFail($id);
        $slider->update([
            'title'       => $request->title,
            'heading'     => $request->heading,
            'description' => $request->description,
            'button_name' => $request->button_name,
            'button_link' => $request->button_link,
        ]);
        if ($request->image) {
            $this->image_upload($request, $slider);
        }
        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider->image) {
            unlink(public_path('uploads/slider/' . $slider->image));
        }
        $slider->delete();
        return back()->with('success', 'Slider deleted successfully.');
    }

    public function changeStatus($id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider->status == 1) {
            $slider->status = 0;
        } else {
            $slider->status = 1;
        }
        $slider->update();
        return response()->json([
            'type'    => 'success',
            'message' => 'Status Updated',
        ]);
    }

    public function image_upload($request, $slider)
    {
        $uploaded_photo = $request->file('image');
        $slider         = Slider::findOrFail($slider->id);
        $old_photo_path = base_path('public/uploads/slider/' . $slider->image);
        if ($slider->image && File::exists($old_photo_path) && ! is_dir($old_photo_path)) {
            File::delete($old_photo_path);
        }
        $photo_location = 'public/uploads/slider/';
        $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
        $new_photo_path = base_path($photo_location . $new_photo_name);

        Image::make($uploaded_photo)->save($new_photo_path);
        $slider->update([
            'image' => $new_photo_name,
        ]);
    }

}
