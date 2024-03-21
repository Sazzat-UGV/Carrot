<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::latest('id')->get();
        return view('admin.pages.wirehouse.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.wirehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'warehouse_name' => 'required|string|max:255',
            'warehouse_phone' => 'nullable|string|max:255',
            'warehouse_address' => 'nullable|string|max:255',
        ]);
        Warehouse::create([
            'warehouse_name' => $request->warehouse_name,
            'warehouse_phone' => $request->warehouse_phone,
            'warehouse_address' => $request->warehouse_address,
        ]);
        Toastr::success('Warehouse added successfully!');
        return redirect()->route('warehouse.index');
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
        return view('admin.pages.wirehouse.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'warehouse_name' => 'required|string|max:255',
            'warehouse_phone' => 'nullable|string|max:255',
            'warehouse_address' => 'nullable|string|max:255',
        ]);
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->update([
            'warehouse_name' => $request->warehouse_name,
            'warehouse_phone' => $request->warehouse_phone,
            'warehouse_address' => $request->warehouse_address,
        ]);
        Toastr::success('Warehouse updated successfully!');
        return redirect()->route('warehouse.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();
        Toastr::success('Warehouse deleted successfully!');
        return back();
    }
}
