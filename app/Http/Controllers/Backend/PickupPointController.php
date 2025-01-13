<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PickupPoint;
use Illuminate\Http\Request;

class PickupPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pickup_points = PickupPoint::latest('id')->get();
        return view('backend.pages.pickup_point.index', compact('pickup_points'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.pickup_point.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'primary_phone' => 'required|string|max:15',
            'secondary_phone' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        PickupPoint::create([
            'name' => $request->name,
            'primary_phone' => $request->primary_phone,
            'secondary_phone' => $request->secondary_phone,
            'address' => $request->address,
        ]);
        return redirect()->route('admin.pickup-point.index')->with('success', 'Pickup point added successfully.');
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
        $pickup_point = PickupPoint::findOrFail($id);
        return view('backend.pages.pickup_point.edit', compact('pickup_point'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'primary_phone' => 'required|string|max:15',
            'secondary_phone' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);
        $pickup_point = PickupPoint::findOrFail($id);
        $pickup_point->update([
            'name' => $request->name,
            'primary_phone' => $request->primary_phone,
            'secondary_phone' => $request->secondary_phone,
            'address' => $request->address,
        ]);
        return redirect()->route('admin.pickup-point.index')->with('success', 'Pickup point updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pickup_point = PickupPoint::findOrFail($id)->delete();
        return back()->with('success', 'Pickup point deleted successfully.');
    }
}
