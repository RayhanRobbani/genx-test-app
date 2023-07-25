<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    // THE FOLLOWING FUNCTION RETURNS THE INDEX VIEW OF BRAND RECORDS
    public function index()
    {
        $data['brands'] = Brand::all();
        return view('brands.index', $data);
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF CREATING A BRAND RECORD
    public function create()
    {
        return view('brands.create');
    }

    // THE FOLLOWING FUNCTION STORES A NEW RECORD OF A BRAND
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'logo' => ['required']
        ]);

        if($request->hasFile('logo')) {
            $name = time();
            $extension = $request->file('logo')->getClientOriginalExtension();
            $path = Storage::putFileAs('brands', $request->file('logo'), $name . '.' . $extension);
        }

        $brand = Brand::create([
            'title' => $request->title,
            'logo' => $path
        ]);

        if($brand) {
            return redirect()->route('brands.index')->with('success', 'Brand added successfully!');
        }

        return redirect()->back()->with('error', 'An error occured!');
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF EDITING A BRAND RECORD
    public function edit(Brand $brand)
    {
        $data['brand'] = $brand;
        return view('brands.edit', $data);
    }

    // THE FOLLOWING FUNCTION UPDATES THE RECORD OF A BRAND
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'status' => ['required']
        ]);

        if($request->hasFile('logo')) {
            Storage::delete($brand->logo);

            $name = time();
            $extension = $request->file('logo')->getClientOriginalExtension();
            $path = Storage::putFileAs('brands', $request->file('logo'), $name . '.' . $extension);
        }

        $brand->update([
            'title' => $request->title,
            'status' => $request->status,
            'logo' => $path,
        ]);

        return redirect()->route('brands.index')->with('success', 'Brand edited successfully!');
    }

    // THE FOLLOWING FUNCTION DELETES A RECORD OF BRAND
    public function destroy(Brand $brand)
    {
        Storage::delete($brand->logo);
        $brand->delete();

        return redirect()->back()->with('success', 'Brand deleted successfully!');
    }
}
