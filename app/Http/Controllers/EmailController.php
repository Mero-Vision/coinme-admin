<?php

namespace App\Http\Controllers;

use App\Http\Requests\Email\CreateComposeRequest;
use App\Mail\EmailTemplate;
use App\Models\Email;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function composeEmailIndex($settingable_type = null, $settingable_id = null){

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
       

        
        return view('admin.email.compose_email',compact('data'));
    }

    public function sendEmailIndex($settingable_type = null, $settingable_id = null)
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
       

        return view('admin.email.send_email', compact('data'));
    }

    public function sendEmailData(){
        $email=Email::where('user_id',auth()->user()->id)->latest()->get();
        return response()->json(['data'=>$email]);
    }

    public function viewSendEmail($emailID, $settingable_type = null, $settingable_id = null){
        $email = Email::find($emailID);

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
       

        return view('admin.email.view_email', compact('email','data'));
        
    }

    public function viewTrash($settingable_type = null, $settingable_id = null){

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
       

        return view('admin.email.trash', compact('data'));
    }

    public function trashData()
    {
        $email=Email::onlyTrashed()->get();
        return response()->json(['data' => $email]);
    }

    public function permanentDelete($id)
    {
        $email = Email::withTrashed()->find($id);

        if ($email) {
            $email->forceDelete();
            return response()->json(['status' => 'success', 'message' => 'Email deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Email Not Found!']);
        }
    }

    public function restoreDeletedEmail($id)
    {
        $email = Email::withTrashed()->find($id);

        if ($email) {
            $email->restore();
            return response()->json(['status' => 'success', 'message' => 'Email restored successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Email Not Found!']);
        }
    }

    public function deleteEmail($id)
    {
        $email = Email::find($id);

        if ($email) {
            $email->delete();
            return response()->json(['status' => 'success', 'message' => 'Email deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Email Not Found!']);
        }
    }

    public function sendEmail(CreateComposeRequest $request){

        try{
            $email=DB::transaction(function()use($request){
                $email=Email::create([
                    'subject'=>$request->subject,
                    'email'=>$request->email,
                    'message'=>$request->message,
                    'user_id'=>auth()->user()->id
                    
                ]);
                Mail::to($request->email)->send(new EmailTemplate($email));
                return $email;
                
            });
            if($email){
                sweetalert()->addSuccess('Email is send successfully!');
                return back();
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
            
        }
        
    }
}