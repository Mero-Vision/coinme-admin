<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index($settingable_type = null, $settingable_id = null){
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
        
        return view('admin.profile',compact('data'));
    }

    public function editProfileIndex($settingable_type = null, $settingable_id = null){
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
        
        return view('admin.edit_profile',compact('data'));
    }

    public function updateProfile(Request $request,$id){
        
        $user=User::find($id);
        if(!$user){
            return back()->with('error','User not found');
        }
        try{
            DB::transaction(function()use($user,$request){
                $user->update([
                    'name'=>$request->name,
                    'mobile_no'=>$request->mobile_no,
                    'email'=>$request->email,
                    'address'=>$request->address,
                    'gender'=>"$request->gender"
                    
                    
                ]);
                if($request->profile_image){
                    $user->clearMediaCollection('profile_image');
                    $user->addMedia($request->profile_image)->toMediaCollection('profile_image');
                }
                return $user;
                
                
            });
            if($user){
                sweetalert()->addSuccess('User data updated successfully!');
                return back();
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
            
        }
    }
}