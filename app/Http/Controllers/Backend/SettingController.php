<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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
        //update .env

        Artisan::call("env:set APP_NAME='".$request->input('site_title')."' ");

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

    public function appearance()
    {
        return view('dashboard.Settings.appearance');
    }

    public function appearanceUpdate(Request $request)
    {
        $this->validate($request, [
            'site_logo' => 'required|image',
            'site_favicon' => 'nullable|image',
        ]);

        Setting::updateOrCreate(
            ['name' => 'site_logo'],
            ['value' => $request->input('site_logo')]
        );

        //update .env
        //Artisan::call("env:set APP_NAME='".$request->input('site_logo')."' ");

        notify()->success('Settings Updated', 'Success');
        return back();
    }
}
