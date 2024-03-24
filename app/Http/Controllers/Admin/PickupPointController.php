<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PickupPoint;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PickupPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pickup_points = PickupPoint::latest('id')->get();
        return view('admin.pages.pickup_point.index', compact('pickup_points'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.pickup_point.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pickup_point_name' => 'required|string|max:255',
            'pickup_point_address' => 'required|string|max:255',
            'pickup_point_phone' => 'required|string|max:15',
            'pickup_point_phone_alt' => 'nullable|string|max:255',
        ]);
        PickupPoint::create([
            'pickup_point_name' => $request->pickup_point_name,
            'pickup_point_address' => $request->pickup_point_address,
            'pickup_point_phone' => $request->pickup_point_phone,
            'pickup_point_phone_alt' => $request->pickup_point_phone_alt,
        ]);
        Toastr::success('Pickup point added successfully!');
        return redirect()->route('pickup_point.index');
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
        $pickup_points = PickupPoint::findOrFail($id);
        return view('admin.pages.pickup_point.edit', compact('pickup_points'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pickup_point_name' => 'required|string|max:255',
            'pickup_point_address' => 'required|string|max:255',
            'pickup_point_phone' => 'required|string|max:15',
            'pickup_point_phone_alt' => 'nullable|string|max:255',
        ]);
        $pickup_points = PickupPoint::findOrFail($id);
        $pickup_points->update([
            'pickup_point_name' => $request->pickup_point_name,
            'pickup_point_address' => $request->pickup_point_address,
            'pickup_point_phone' => $request->pickup_point_phone,
            'pickup_point_phone_alt' => $request->pickup_point_phone_alt,
        ]);
        Toastr::success('Pickup point updated successfully!');
        return redirect()->route('pickup_point.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pickup_points = PickupPoint::findOrFail($id);
        $pickup_points->delete();
        Toastr::success('Pickup point deleted successfully!');
        return back();
    }

}
