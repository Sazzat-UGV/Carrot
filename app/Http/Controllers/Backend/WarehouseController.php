<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::latest('id')->get();
        return view('backend.pages.warehouse.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'warehouse_name' => 'required|string|max:255',
            'warehouse_phone' => 'required|string|max:15',
            'warehouse_address' => 'required|string|max:255',
        ]);
        Warehouse::create([
            'name' => $request->warehouse_name,
            'phone' => $request->warehouse_phone,
            'address' => $request->warehouse_address,
        ]);
        return redirect()->route('admin.warehouse.index')->with('success', 'Warehouse added successfully.');
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
        $warehouse = Warehouse::findOrFail($id);
        return view('backend.pages.warehouse.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'warehouse_name' => 'required|string|max:255',
            'warehouse_phone' => 'required|string|max:15',
            'warehouse_address' => 'required|string|max:255',
        ]);
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->update([
            'name' => $request->warehouse_name,
            'phone' => $request->warehouse_phone,
            'address' => $request->warehouse_address,
        ]);
        return redirect()->route('admin.warehouse.index')->with('success', 'Warehouse updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warehouse = Warehouse::findOrFail($id)->delete();
        return back()->with('success', 'Warehouse deleted successfully.');
    }
}
