<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::latest('id')->get();
        return view('backend.pages.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string|max:255',
            'validate_date' => 'required|date',
            'type' => 'required|string',
            'amount' => 'required|numeric',
        ]);
        Coupon::create([
            'coupon_code' => $request->coupon_code,
            'validate_date' => $request->validate_date,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);
        return redirect()->route('admin.coupon.index')->with('success', 'Coupon added successfully.');
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
        $coupon = Coupon::findOrFail($id);
        return view('backend.pages.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'coupon_code' => 'required|string|max:255',
            'validate_date' => 'required|date',
            'type' => 'required|string',
            'amount' => 'required|numeric',
        ]);
        $coupon = Coupon::findOrFail($id);
        $coupon->update([
            'coupon_code' => $request->coupon_code,
            'validate_date' => $request->validate_date,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);
        return redirect()->route('admin.coupon.index')->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Coupon deleted successfully.');
    }
    public function changeStatus($id)
    {
        $coupon = Coupon::findOrFail($id);
        if ($coupon->status == 1) {
            $coupon->status = 0;
        } else {
            $coupon->status = 1;
        }
        $coupon->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Status Updated',
        ]);
    }
}
