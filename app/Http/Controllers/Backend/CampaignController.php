<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::latest('id')->get();
        return view('backend.pages.campaign.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'   => 'required|date',
            'image'      => 'required|image|mimes:png,jpg,jpeg|max:10240',
            'discount'   => 'required|numeric',
        ]);

        $campaign = Campaign::create([
            'title'      => $request->title,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'discount'   => $request->discount,
        ]);
        $this->image_upload($request, $campaign);
        return redirect()->route('admin.campaign.index')->with('success', 'Campaign added successfully.');
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
        $campaign = Campaign::findOrFail($id);
        return view('backend.pages.campaign.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'   => 'required|date',
            'image'      => 'sometimes|image|mimes:png,jpg,jpeg|max:10240',
            'discount'   => 'required|numeric',
        ]);

        $campaign = Campaign::findOrFail($id);
        $campaign->update([
            'title'      => $request->title,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'discount'   => $request->discount,
        ]);
        if ($request->image) {
            $this->image_upload($request, $campaign);
        }
        return redirect()->route('admin.campaign.index')->with('success', 'Campaign updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $campaign = Campaign::findOrFail($id);
        unlink(base_path('public/uploads/campaign/' . $campaign->image));
        $campaign->delete();
        return redirect()->route('admin.campaign.index')->with('success', 'Campaign deleted successfully.');
    }

    public function changeStatus($id)
    {
        $campaign = Campaign::findOrFail($id);
        if ($campaign->status == 1) {
            $campaign->status = 0;
        } else {
            $campaign->status = 1;
        }
        $campaign->update();
        return response()->json([
            'type'    => 'success',
            'message' => 'Status Updated',
        ]);
    }

    public function image_upload($request, $campaign)
    {
        $uploaded_photo = $request->file('image');
        $campaign       = Campaign::findOrFail($campaign->id);
        $old_photo_path = base_path('public/uploads/campaign/' . $campaign->image);
        if ($campaign->image && File::exists($old_photo_path) && ! is_dir($old_photo_path)) {
            File::delete($old_photo_path);
        }
        $photo_location = 'public/uploads/campaign/';
        $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
        $new_photo_path = base_path($photo_location . $new_photo_name);

        Image::make($uploaded_photo)->save($new_photo_path);
        $campaign->update([
            'image' => $new_photo_name,
        ]);
    }
}
