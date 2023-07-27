<?php

namespace App\Http\Controllers;

use App\Models\ProductUnit;
use Illuminate\Http\Request;

class ProductUnitController extends Controller
{
    // THE FOLLOWING FUNCTION RETURNS THE INDEX VIEW OF PRODUCT UNIT RECORDS
    public function index()
    {
        $data['units'] = ProductUnit::all();
        return view('products.units.index', $data);
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF CREATING A PRODUCT UNIT RECORD
    public function create()
    {
        return view('products.units.create');
    }

    // THE FOLLOWING FUNCTION STORES A NEW RECORD OF A PRODUCT UNIT
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required']
        ]);

        $units = ProductUnit::create($validated);

        if($units) {
            return redirect()->route('productUnits.index')->with('success', 'Unit added successfully!');
        }

        return redirect()->back()->with('error', 'An error occured!');
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF EDITING A PRODUCT UNIT RECORD
    public function edit(ProductUnit $unit)
    {
        $data['unit'] = $unit;
        return view('products.units.edit', $data);
    }

    // THE FOLLOWING FUNCTION UPDATES THE RECORD OF A PRODUCT UNIT
    public function update(Request $request, ProductUnit $unit)
    {
        $validated = $request->validate([
            'name' => ['required']
        ]);

        $unit->update($validated);

        return redirect()->route('productUnits.index')->with('success', 'Unit edited successfully!');
    }

    // THE FOLLOWING FUNCTION DELETES A RECORD OF PRODUCT UNIT
    public function destroy(ProductUnit $unit)
    {
        $unit->delete();

        return redirect()->back()->with('success', 'Unit deleted successfully!');
    }
}
