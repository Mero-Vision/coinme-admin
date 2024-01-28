<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index(){
        $users = DB::table('messages')
        ->join('users', 'users.id', '=', 'messages.sender_id')
        ->select('users.name', DB::raw('MAX(messages.created_at) as latest_created_at'), 'messages.sender_id')
            ->groupBy('users.name', 'messages.sender_id')
        ->orderByDesc('latest_created_at')
        ->get();

        return view('admin.chat',compact('users'));
    }

    public function show($id){

         $user = DB::table('messages')
        ->join('users', 'users.id', '=', 'messages.sender_id')
        ->where('messages.sender_id',$id)->get();

        return response()->json(['data'=>$user]);
        
        
    }
}