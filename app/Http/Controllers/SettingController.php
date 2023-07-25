<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // THE FOLLOWING FUNCTION RETURNS THE SITE SETTINGS VIEW
    public function settings()
    {
        $data['settings'] = Setting::all()->pluck('value', 'key');
        return view('settings', $data);
    }

    // THE FOLLOWING FUNCTION UPDATES THE SITE SETTINGS
    public function updateSettings(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['site_logo']);

        foreach($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        if($request->hasFile('site_logo')) {
            $extension = $request->file('site_logo')->getClientOriginalExtension();
            Storage::putFileAs('public', $request->file('site_logo'), 'site_logo.' . $extension);
            $path = 'storage/site_logo.' . $extension;

            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $path]
            );
        }

        return redirect()->back()->with('success', 'Settings saves successfully!');
    }

    // THE FOLLOWING FUNCTION UPDATES THE AUTHENTICATED USER'S PASSWORD
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed']
        ]);

        if(Hash::check($request->current_password, $request->user()->password)) {
            $request->user()->update(['password' => Hash::make($request->password)]);

            return redirect()->back()->with('success', 'Password updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Current password is incorrect!');
        }
    }
}
