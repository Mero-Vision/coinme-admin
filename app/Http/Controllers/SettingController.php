<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index($settingable_type = null, $settingable_id = null)
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

        
        return view('admin.setting.setting',compact('data'));
    }

    public function appSettingIndex($settingable_type = null, $settingable_id = null)
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

        return view('admin.setting.app_setting',compact('data'));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::find(auth()->user()->id);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Incorrect Old Password!');
        }

        if (Hash::check($request->old_password, $request->new_password)) {
            return back()->with('error', 'Old password should not be the same as New Password');
        }

        if (!Hash::check($request->new_password, $request->confirm_password)) {
            return back()->with('error', 'New Password and Confirm Password do not match');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password Changed Successfully!');
    }
}