<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // THE FOLLOWING FUNCTION RETURNS THE INDEX VIEW OF COUPON RECORDS
    public function index()
    {
        $data['coupons'] = Coupon::all();
        return view('coupons.index', $data);
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF CREATING A COUPON RECORD
    public function create()
    {
        return view('coupons.create');
    }

    // THE FOLLOWING FUNCTION STORES A NEW RECORD OF A COUPON
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'code' => ['required'],
            'value' => ['required'],
            'discount_type' => ['required'],
            'coupon_usage_limit' => ['required'],
            'user_usage_limit' => ['required'],
            'minimum_spend' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required']
        ]);

        $coupon = Coupon::create($validated);

        if($coupon) {
            return redirect()->route('coupons.index')->with('success', 'Coupon added successfully!');
        }

        return redirect()->back()->with('error', 'An error occured!');
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF EDITING A COUPON RECORD
    public function edit(Coupon $coupon)
    {
        $data['coupon'] = $coupon;
        return view('coupons.edit', $data);
    }

    // THE FOLLOWING FUNCTION UPDATES THE RECORD OF A COUPON
    public function update(Request $request, Coupon $coupon)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'code' => ['required'],
            'value' => ['required'],
            'discount_type' => ['required'],
            'free_shipping' => ['required'],
            'status' => ['required'],
            'coupon_usage_limit' => ['required'],
            'user_usage_limit' => ['required'],
            'minimum_spend' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required']
        ]);

        $coupon->update($validated);

        return redirect()->route('coupons.index')->with('success', 'Coupon edited successfully!');
    }

    // THE FOLLOWING FUNCTION DELETES A RECORD OF COUPON
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return redirect()->back()->with('success', 'Coupon deleted successfully!');
    }
}
