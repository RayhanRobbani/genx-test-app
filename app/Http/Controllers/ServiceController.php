<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // THE FOLLOWING FUNCTION RETURNS THE INDEX VIEW OF SERVICE RECORDS
    public function index()
    {
        $data['services'] = Service::all();
        return view('services.index', $data);
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF CREATING A SERVICE RECORD
    public function create()
    {
        return view('services.create');
    }

    // THE FOLLOWING FUNCTION STORES A NEW RECORD OF A SERVICE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'subtitle' => ['required'],
            'icon' => ['required']
        ]);

        if($request->hasFile('icon')) {
            $name = time();
            $extension = $request->file('icon')->getClientOriginalExtension();
            $path = Storage::putFileAs('services', $request->file('icon'), $name . '.' . $extension);
        }

        $service = Service::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'icon' => $path
        ]);

        if($service) {
            return redirect()->route('services.index')->with('success', 'Service added successfully!');
        }

        return redirect()->back()->with('error', 'An error occured!');
    }

    // THE FOLLOWING FUNCTION RETURNS THE VIEW OF EDITING A SERVICE RECORD
    public function edit(Service $service)
    {
        $data['service'] = $service;
        return view('services.edit', $data);
    }

    // THE FOLLOWING FUNCTION UPDATES THE RECORD OF A SERVICE
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'subtitle' => ['required'],
            'status' => ['required']
        ]);

        if($request->hasFile('icon')) {
            Storage::delete($service->icon);

            $name = time();
            $extension = $request->file('icon')->getClientOriginalExtension();
            $path = Storage::putFileAs('services', $request->file('icon'), $name . '.' . $extension);
        }

        $service->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'status' => $request->status,
            'icon' => $path,
        ]);

        return redirect()->route('services.index')->with('success', 'Service edited successfully!');
    }

    // THE FOLLOWING FUNCTION DELETES A RECORD OF SERVICE
    public function destroy(Service $service)
    {
        Storage::delete($service->icon);
        $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully!');
    }
}
