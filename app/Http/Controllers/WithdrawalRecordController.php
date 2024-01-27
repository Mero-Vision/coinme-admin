<?php

namespace App\Http\Controllers;

use App\Models\ClientRechargeHistory;
use App\Models\SiteSetting;
use App\Models\WithdrawRecord;
use Illuminate\Http\Request;

class WithdrawalRecordController extends Controller
{
    public function index($settingable_type = null, $settingable_id = null){
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
        
        return view('admin.order_record.withdrawal_record',compact('data'));
    }

    public function orderHistoryData(){
        
        $orders=WithdrawRecord::join('users', 'users.id','=', 'withdraw_records.client_id')
        ->latest('withdraw_records.created_at','desc')->get();
       

        return response()->json(['data'=>$orders]);
    }
}