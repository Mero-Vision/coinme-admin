<?php

namespace App\Http\Controllers;

use App\Http\Requests\Email\CreateComposeRequest;
use App\Mail\EmailTemplate;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function composeEmailIndex(){
        return view('admin.email.compose_email');
    }

    public function sendEmailIndex()
    {
        return view('admin.email.send_email');
    }

    public function sendEmailData(){
        $email=Email::where('user_id',auth()->user()->id)->latest()->get();
        return response()->json(['data'=>$email]);
    }

    public function viewSendEmail($emailID){
        $email = Email::find($emailID);
        return view('admin.email.view_email', compact('email'));
        
    }

    public function viewTrash(){
        return view('admin.email.trash');
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