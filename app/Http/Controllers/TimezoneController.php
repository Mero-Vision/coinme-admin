<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\TimeZone;
use Illuminate\Http\Request;

class TimezoneController extends Controller
{
    public function timzeZoneSettingIndex($settingable_type = null, $settingable_id = null)
    {
        $setting = SiteSetting::all();

        $site_setting = SiteSetting::where("settingable_type", $settingable_type)
            ->where("settingable_id", $settingable_id)
            ->get();
        $data = [];
        foreach ($site_setting as $item) {
            if ($item->type == 'image') {
                $data[$item->key] = $item->getFirstMediaUrl();
            } else {
                $data[$item->key] = $item->value;
            }
        }

        return view('admin.setting.timezone_settings', compact('data'));
    }

    
    public function update(Request $request)
    {
        $request->validate([
            'timezone' => 'required|timezone',
        ]);

        $timezone = TimeZone::first() ?: new Timezone;
        $timezone->name = $request->input('timezone');
        $timezone->save();

        return redirect()->back()->with('success', 'Timezone updated successfully!');
    }
}