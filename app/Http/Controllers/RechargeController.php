<?php

namespace App\Http\Controllers;

use App\Http\Requests\Recharge\CreateRechargeRequest;
use App\Models\ClientRecharge;
use App\Models\ClientRechargeHistory;
use App\Models\Recharge;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RechargeController extends Controller
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
        
        return view('admin.mybalance.quick_recharge',compact('data'));
    }

    public function viewRechargePending($settingable_type = null, $settingable_id = null)
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
        
        return view('admin.mybalance.view_recharge_pending',compact('data'));
    }

    public function viewRechargeForClients($settingable_type = null, $settingable_id = null)
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

        return view('admin.mybalance.view_clients', compact('data'));
    }

    public function rechargePendingData()
    {
        $rechargePending = ClientRecharge::where('status','=','pending')->latest()->get();

        return response()->json(['data' => $rechargePending]);
    }

    public function rechargeClientData()
    {
        $rechargePending = User::where('status','!=','admin')->latest()->get();

        return response()->json(['data' => $rechargePending]);
    }

    public function save(CreateRechargeRequest $request)
    {

        try {
            $recharge = DB::transaction(function () use ($request) {
                $recharge = Recharge::create([
                    'recharge_amount' => $request->recharge_amount,
                    'payment_address' => $request->payment_address,
                    'client_id' => auth()->user()->id

                ]);
                return $recharge;
            });
            if ($recharge) {
                sweetalert()->addSuccess('Recharge request send successfully!');
                return back();
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function rechargeHistory($settingable_type = null, $settingable_id = null){
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
        
        return view('admin.mybalance.recharge_history',compact('data'));
    }

    public function rechargeHistoryData()
    {

        $history = ClientRechargeHistory::latest()->get();


        return response()->json(['data' => $history]);
    }
}