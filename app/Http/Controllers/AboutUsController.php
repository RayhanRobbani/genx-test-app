<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    // THE FOLLOWING FUNCTION RETURNS THE INDEX VIEW OF ABOUT SECTION RECORDS
    public function index()
    {
        $data['abouts'] = AboutUs::all();
        return view('about-us.index', $data);
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF CREATING A ABOUT SECTION RECORD
    public function create()
    {
        return view('about-us.create');
    }

    // THE FOLLOWING FUNCTION STORES A NEW RECORD OF A ABOUT SECTION
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['required']
        ]);

        $section = AboutUs::create($validated);

        if($section) {
            return redirect()->route('aboutUs.index')->with('success', 'Section added successfully!');
        }

        return redirect()->back()->with('error', 'An error occured!');
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF EDITING A ABOUT SECTION RECORD
    public function edit(AboutUs $about)
    {
        $data['about'] = $about;
        return view('about-us.edit', $data);
    }

    // THE FOLLOWING FUNCTION UPDATES THE RECORD OF A ABOUT SECTION
    public function update(Request $request, AboutUs $about)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'status' => ['required']
        ]);

        $about->update($validated);

        return redirect()->route('aboutUs.index')->with('success', 'Section edited successfully!');
    }

    // THE FOLLOWING FUNCTION DELETES A RECORD OF ABOUT SECTION
    public function destroy(AboutUs $about)
    {
        $about->delete();

        return redirect()->back()->with('success', 'Section deleted successfully!');
    }
}
