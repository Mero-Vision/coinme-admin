<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   
    public function adminIndex($settingable_type = null, $settingable_id = null){
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

        
        return view('admin.contact_us',compact('data'));
    }

    public function contactDataAjax()
    {
        $user = ContactUs::latest()->get();
        return response()->json(['data' => $user]);
    }

    public function deleteContact($id)
    {
        $contact = ContactUs::find($id);

        if ($contact) {
            $contact->delete();
            return response()->json(['status' => 'success', 'message' => 'Contact Message deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Contact Not Found!']);
        }
    }
}