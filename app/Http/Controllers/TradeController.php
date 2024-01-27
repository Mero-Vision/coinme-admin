<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\TradeTransaction;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function tradeHistory($settingable_type = null, $settingable_id = null)
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
        return view('admin.order_record.trade_history',compact('data'));
    }

    public function tradeHistoryData()
    {

        $history = TradeTransaction::join('users', 'users.id', '=', 'trade_transactions.client_id')
        ->where('trade_transactions.trade_status','!=',null)->latest('trade_transactions.created_at','desc')->get();


        return response()->json(['data' => $history]);
    }
}