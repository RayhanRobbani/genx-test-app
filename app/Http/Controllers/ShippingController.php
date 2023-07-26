<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use App\Models\ShippingProvider;
use Illuminate\Support\Facades\Storage;

class ShippingController extends Controller
{
    // THE FOLLOWING FUNCTION RETURNS THE INDEX VIEW OF SHIPPING CHARGE RECORDS
    public function shippingChargesIndex()
    {
        $data['shipping_charges'] = ShippingCharge::paginate(10);
        return view('shipping.shipping-charges.index', $data);
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF EDITING A SHIPPING CHARGE RECORD
    public function shippingChargesEdit(ShippingCharge $shipping_charge)
    {
        $data['shipping_charge'] = $shipping_charge;
        return view('shipping.shipping-charges.edit', $data);
    }

    // THE FOLLOWING FUNCTION UPDATES THE RECORD OF A SHIPPING CHARGE
    public function shippingChargesUpdate(Request $request, ShippingCharge $shipping_charge)
    {
        $validated = $request->validate([
            'shipping_charge' => ['required'],
            'cash_on_delivery' => ['required']
        ]);

        $shipping_charge->update($validated);

        return redirect()->route('shippingCharges.index')->with('success', 'Shipping charge edited successfully!');
    }

    // THE FOLLOWING FUNCTION RETURNS THE INDEX VIEW OF SHIPPING PROVIDER RECORDS
    public function shippingProvidersIndex()
    {
        $data['shipping_providers'] = ShippingProvider::paginate(10);
        return view('shipping.shipping-providers.index', $data);
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF CREATING A SHIPPING PROVIDER RECORD
    public function shippingProvidersCreate()
    {
        return view('shipping.shipping-providers.create');
    }

    // THE FOLLOWING FUNCTION STORES A NEW RECORD OF A SHIPPING PROVIDER
    public function shippingProvidersStore(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'logo' => ['required'],
            'delivery_days_local' => ['required'],
            'delivery_days_outside' => ['required']
        ]);

        if($request->hasFile('logo')) {
            $name = time();
            $extension = $request->file('logo')->getClientOriginalExtension();
            $path = Storage::putFileAs('shippingProviders', $request->file('logo'), $name . '.' . $extension);
        }

        $shipping_provider = ShippingProvider::create([
            'name' => $request->name,
            'delivery_days_local' => $request->delivery_days_local,
            'delivery_days_outside' => $request->delivery_days_outside,
            'logo' => $path
        ]);

        if($shipping_provider) {
            return redirect()->route('shippingProviders.index')->with('success', 'Shipping provider added successfully!');
        }

        return redirect()->back()->with('error', 'An error occured!');
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF EDITING A SHIPPING PROVIDER RECORD
    public function shippingProvidersEdit(ShippingProvider $shipping_provider)
    {
        $data['shipping_provider'] = $shipping_provider;
        return view('shipping.shipping-providers.edit', $data);
    }

    // THE FOLLOWING FUNCTION UPDATES THE RECORD OF A SHIPPING PROVIDER
    public function shippingProvidersUpdate(Request $request, ShippingProvider $shipping_provider)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'delivery_days_local' => ['required'],
            'delivery_days_outside' => ['required'],
            'status' => ['required']
        ]);

        if($request->hasFile('logo')) {
            Storage::delete($shipping_provider->logo);

            $name = time();
            $extension = $request->file('logo')->getClientOriginalExtension();
            $path = Storage::putFileAs('shippingProviders', $request->file('logo'), $name . '.' . $extension);

            $shipping_provider->update([
                'logo' => $path
            ]);
        }

        $shipping_provider->update([
            'name' => $request->name,
            'delivery_days_local' => $request->delivery_days_local,
            'delivery_days_outside' => $request->delivery_days_outside,
            'status' => $request->status,
        ]);

        return redirect()->route('shippingProviders.index')->with('success', 'Shipping provider edited successfully!');
    }

    // THE FOLLOWING FUNCTION DELETES A RECORD OF SHIPPING PROVIDER
    public function shippingProvidersDestroy(ShippingProvider $shipping_provider)
    {
        Storage::delete($shipping_provider->logo);
        $shipping_provider->delete();

        return redirect()->back()->with('success', 'Shipping provider deleted successfully!');
    }
}
