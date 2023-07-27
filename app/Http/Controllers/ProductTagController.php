<?php

namespace App\Http\Controllers;

use App\Models\ProductTag;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    // THE FOLLOWING FUNCTION RETURNS THE INDEX VIEW OF PRODUCT TAG RECORDS
    public function index()
    {
        $data['tags'] = ProductTag::all();
        return view('products.tags.index', $data);
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF CREATING A PRODUCT TAG RECORD
    public function create()
    {
        return view('products.tags.create');
    }

    // THE FOLLOWING FUNCTION STORES A NEW RECORD OF A PRODUCT TAG
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required']
        ]);

        $tag = ProductTag::create($validated);

        if($tag) {
            return redirect()->route('productTags.index')->with('success', 'Tag added successfully!');
        }

        return redirect()->back()->with('error', 'An error occured!');
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF EDITING A PRODUCT TAG RECORD
    public function edit(ProductTag $tag)
    {
        $data['tag'] = $tag;
        return view('products.tags.edit', $data);
    }

    // THE FOLLOWING FUNCTION UPDATES THE RECORD OF A PRODUCT TAG
    public function update(Request $request, ProductTag $tag)
    {
        $validated = $request->validate([
            'name' => ['required']
        ]);

        $tag->update($validated);

        return redirect()->route('productTags.index')->with('success', 'Tag edited successfully!');
    }

    // THE FOLLOWING FUNCTION DELETES A RECORD OF PRODUCT TAG
    public function destroy(ProductTag $tag)
    {
        $tag->delete();

        return redirect()->back()->with('success', 'Tag deleted successfully!');
    }
}
