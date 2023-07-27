<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    // THE FOLLOWING FUNCTION RETURNS THE INDEX VIEW OF PRODUCT ATTRIBUTE RECORDS
    public function index()
    {
        $data['attributes'] = ProductAttribute::all();
        return view('products.attributes.index', $data);
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF CREATING A PRODUCT ATTRIBUTE RECORD
    public function create()
    {
        return view('products.attributes.create');
    }

    // THE FOLLOWING FUNCTION STORES A NEW RECORD OF A PRODUCT ATTRIBUTE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'value' => ['required']
        ]);

        $attribute = ProductAttribute::create($validated);

        if($attribute) {
            return redirect()->route('productAttributes.index')->with('success', 'Attribute added successfully!');
        }

        return redirect()->back()->with('error', 'An error occured!');
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF EDITING A PRODUCT ATTRIBUTE RECORD
    public function edit(ProductAttribute $attribute)
    {
        $data['attribute'] = $attribute;
        return view('products.attributes.edit', $data);
    }

    // THE FOLLOWING FUNCTION UPDATES THE RECORD OF A PRODUCT ATTRIBUTE
    public function update(Request $request, ProductAttribute $attribute)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'value' => ['required']
        ]);

        $attribute->update($validated);

        return redirect()->route('productAttributes.index')->with('success', 'Attribute edited successfully!');
    }

    // THE FOLLOWING FUNCTION DELETES A RECORD OF PRODUCT ATTRIBUTE
    public function destroy(ProductAttribute $attribute)
    {
        $attribute->delete();

        return redirect()->back()->with('success', 'Attribute deleted successfully!');
    }
}
