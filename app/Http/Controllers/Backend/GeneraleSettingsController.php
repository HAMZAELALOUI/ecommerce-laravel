<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;

class GeneraleSettingsController extends Controller
{
    public function index()
    {
        $generalSettings = GeneralSettings::first();
        return view('admin.settings.index', compact('generalSettings'));
    }

    public function UpdateGeneralSettings(Request $request)
    {
        $request->validate([
            'site_name' => ['required', 'max:200'],
            'contact_email' => ['required', 'max:200'],
            'layout' => ['required', 'max:200'],
            'currency_name' => ['required', 'max:200'],
            'currency_icon' => ['required', 'max:200'],
            'time_zone' => ['required', 'max:200'],
        ]);
        GeneralSettings::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => $request->site_name,
                'contact_email' => $request->contact_email,
                'layout' => $request->layout,
                'currency_name' => $request->currency_name,
                'currency_icon' => $request->currency_icon,
                'time_zone' => $request->time_zone,
            ]
        );
        toastr('General Setting Updated Succesfully', 'success', 'success');
        return redirect()->back();
    }
}
