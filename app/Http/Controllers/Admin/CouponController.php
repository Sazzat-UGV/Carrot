<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::latest('id')->get();
        return view('admin.pages.offer.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.offer.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string|max:255|unique:coupons',
            'coupon_amount' => 'required|string|regex:/^[0-9]+$/|max:255',
            'valid_date' => 'required|date',
            'type' => 'required|numeric',
        ]);
        Coupon::create([
            'coupon_code' => $request->coupon_code,
            'valid_date' => $request->valid_date,
            'type' => $request->type,
            'coupon_amount' => $request->coupon_amount,
        ]);
        Toastr::success('Coupon added successfully!');
        return redirect()->route('coupon.index');
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
        return view('admin.pages.offer.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'coupon_code' => 'required|string|max:255|unique:coupons,coupon_code,' . $id,
            'coupon_amount' => 'required|string|regex:/^[0-9]+$/|max:255',
            'valid_date' => 'required|date',
            'type' => 'required|numeric',
        ]);
        $coupon = Coupon::findOrFail($id);

        $coupon->update([
            'coupon_code' => $request->coupon_code,
            'valid_date' => $request->valid_date,
            'type' => $request->type,
            'coupon_amount' => $request->coupon_amount,
        ]);
        Toastr::success('Coupon updated successfully!');
        return redirect()->route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        Toastr::success('Coupon delete successfully!');
        return back();
    }

    public function changeStatus($id)
    {
        $coupon = Coupon::findOrFail($id);
        if ($coupon->status == 1) {
            $status = 0;
        }
        if ($coupon->status == 0) {
            $status = 1;
        }
        $coupon->update([
            'status' => $status,
        ]);
        Toastr::success('Coupon status updated!');
        return back();
    }
}
