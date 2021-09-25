<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function general()
    {
        return view('dashboard.Settings.general');
    }

    public function generalUpdate(Request $request)
    {
        $this->validate($request, [
            'site_title' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:255',
            'site_address' => 'nullable|string|max:255',
        ]);

        Setting::updateOrCreate(
            ['name' => 'site_title'],
            ['value' => $request->input('site_title')]
        );
        Setting::updateOrCreate(
            ['name' => 'site_description'],
            ['value' => $request->input('site_description')]
        );
        Setting::updateOrCreate(
            ['name' => 'site_address'],
            ['value' => $request->input('site_address')]
        );

        notify()->success('Settings Updated', 'Success');
        return back();
    }
}
