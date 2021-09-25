<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

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

        // Upload site logo by deleting old logo first
        if($request->hasFile('site_logo')){
            $this->deleteOldlogo(setting('site_logo'));
            Setting::updateOrCreate(
                ['name' => 'site_logo'],
                ['value' => Storage::disk('public')->putFile('logos', $request->file('site_logo'))]
            );
        }

         // Upload site favicon by deleting old favicon first
        if($request->hasFile('site_favicon')){
            $this->deleteOldlogo(setting('site_favicon'));
            Setting::updateOrCreate(
                ['name' => 'site_favicon'],
                ['value' => Storage::disk('public')->putFile('logos', $request->file('site_favicon'))]
            );
        }

        //update .env
        //Artisan::call("env:set APP_NAME='".$request->input('site_logo')."' ");

        notify()->success('Apperance Updated', 'Success');
        return back();
    }

    private function deleteOldlogo($path){
        Storage::disk('public')->delete(($path));
    }
}
