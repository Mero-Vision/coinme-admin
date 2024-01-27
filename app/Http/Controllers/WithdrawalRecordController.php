<?php

namespace App\Http\Controllers;

use App\Models\ClientRechargeHistory;
use App\Models\WithdrawRecord;
use Illuminate\Http\Request;

class WithdrawalRecordController extends Controller
{
    public function index(){
        return view('admin.order_record.withdrawal_record');
    }

    public function orderHistoryData(){
        
        $orders=WithdrawRecord::join('users', 'users.id','=', 'withdraw_records.client_id')
        ->latest('withdraw_records.created_at','desc')->get();
       

        return response()->json(['data'=>$orders]);
    }
}