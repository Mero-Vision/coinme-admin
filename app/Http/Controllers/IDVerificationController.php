<?php

namespace App\Http\Controllers;

use App\Http\Requests\IDVerification\CreateIDVerificationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IDVerificationController extends Controller
{
    public function index(){
        return view('admin.id_verification');
    }

    public function save(CreateIDVerificationRequest $request){

        $user=User::find(auth()->user()->id);
        if(!$user){
            return back()->with('error','User ID Not Found!');
        }
        try{
            $id=DB::transaction(function () use($user,$request) {
                $user->update([
                    'id_number'=>$request->id_number
                    
                ]);
                $user->addMedia($request->front_image)->toMediaCollection('front_image');
                $user->addMedia($request->back_image)->toMediaCollection('back_image');
                $user->addMedia($request->id_in_hand)->toMediaCollection('id_in_hand');
                return $user;
                
            });
            if($user){
                sweetalert()->addSuccess('ID Verification email submitted successfully!');
                return back();
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
            
        }
        
    }
}