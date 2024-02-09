<?php

namespace App\Http\Controllers;

use App\Models\ClientBalance;
use App\Models\ClientRechargeHistory;
use App\Models\SiteSetting;
use App\Models\WithdrawRecord;
use Illuminate\Http\Request;

class WithdrawalRecordController extends Controller
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

        return view('admin.order_record.withdrawal_record', compact('data'));
    }

    public function pendingWithdrawalRecordIndex($settingable_type = null, $settingable_id = null)
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

        return view('admin.order_record.pending_withdrawal_records', compact('data'));
    }


    public function pendingWithdrawalRecordData()
    {

        $orders = WithdrawRecord::leftjoin('users', 'users.id', '=', 'withdraw_records.client_id')
        ->select(
            'withdraw_records.id',
            'withdraw_records.amount',
            'withdraw_records.client_wallet_address',
            'withdraw_records.coin_type',
            'withdraw_records.status',
            'users.name',
            'users.email'
        )->where('withdraw_records.status','pending')->get();


        return response()->json(['data' => $orders]);
    }

    public function orderHistoryData()
    {

        $orders = WithdrawRecord::leftjoin('users', 'users.id', '=', 'withdraw_records.client_id')
            ->select(
                'withdraw_records.id',
                'withdraw_records.amount',
                'withdraw_records.client_wallet_address',
                'withdraw_records.coin_type',
            'withdraw_records.status',
                'users.name',
                'users.email'
            )->where('withdraw_records.status','!=' ,'pending')->get();


        return response()->json(['data' => $orders]);
    }

    public function statusPaid($id)
    {
        $withdrawRecord = WithdrawRecord::find($id);

        if ($withdrawRecord) {
            $withdrawRecord->update([
                'status' => 'paid'
            ]);
            return response()->json(['status' => 'success', 'message' => 'Paid successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'ID Not Found!']);
        }
    }

    public function rejectWithdraw($id)
    {
        $withdrawRecord = WithdrawRecord::find($id);

        if ($withdrawRecord) {

           
            $withdrawRecord->update([
                'status' => 'reject'
            ]);

            $clientBalance=ClientBalance::join('crypto_currencies', 
              'crypto_currencies.id','=', 'client_balances.currency_id')
              ->where('crypto_currencies.name',$withdrawRecord->coin_type)
              ->where('client_balances.client_id',$withdrawRecord->client_id)
             ->select('client_balances.frozen_amount', 'client_balances.id')->first();
        
              if($clientBalance){
                $newFrozenAmount = $clientBalance->frozen_amount + $withdrawRecord->amount;
                $clientBalance->update([
                    'frozen_amount' => $newFrozenAmount
                ]);
              }
             
            
            
            return response()->json(['status' => 'success', 'message' => 'Paid successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'ID Not Found!']);
        }
    }
}