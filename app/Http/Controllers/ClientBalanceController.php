<?php

namespace App\Http\Controllers;

use App\Http\Requests\Recharge\CreateLoadMoneyRequest;
use App\Models\ClientBalance;
use App\Models\ClientRecharge;
use App\Models\ClientRechargeHistory;
use App\Models\CryptoCurrency;
use App\Models\Recharge;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ClientBalanceController extends Controller
{
    public function index($settingable_type = null, $settingable_id = null)
    {

        $user = Auth::user();
        $clientBalance = ClientBalance::where('client_id', $user->id)->first();

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

        
        return view('admin.mybalance.view_balance', compact('clientBalance','data'));
    }

    public function loadClientBalanceIndex($client_id, $settingable_type = null, $settingable_id = null)
    {

        $clientBalance = ClientRecharge::with('media')->find($client_id);
        if (!$clientBalance) {
            sweetalert()->addWarning('Client Balance ID Not Found!');
            return back();
        }
        $currency=CryptoCurrency::get();

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

        return view('admin.mybalance.load_coin', compact('clientBalance','currency','data'));
    }



    public function loadClientBalance(CreateLoadMoneyRequest $request)
    {

        $clientID = $request->client_id;
        $clientBalance = ClientBalance::where('client_id', $clientID)->where('currency_id',$request->currency_id)->first();

        try {
            $balance = DB::transaction(function () use ($clientBalance, $request, $clientID) {
                $newBalance = $clientBalance->balance + $request->recharge_amount;
                $clientBalance->update([

                    'balance' => $newBalance,
                ]);
                $coinID= $request->currency_id;
                if ($coinID == 1) {
                    $coin = "USDT";
                } elseif ($coinID == 2) {
                    $coin = "Bitcoin";
                } elseif ($coinID == 3) {
                    $coin = "Ethereum";
                }

                ClientRechargeHistory::create([
                    'client_id' => $clientID,
                    'client_name' => $request->client_name,
                    'coin_type' => $coin,
                    'coin_value'=>$request->coin_value,
                    'recharge_amount'=> $request->recharge_amount,
                    'equivalent_coin_amount'=> $request->equivalent_coin_amount,
                    
                ]);

                $user = ClientRecharge::where('user_id',$clientID)->first();

                if ($user) {
                    $user->update([
                        'status' => 'approved'
                    ]);

                }

                return $clientBalance;
            });
            if ($clientBalance) {
                sweetalert()->addSuccess('You have loaded the amount to client successfully!');
                return redirect('admin/users/view-recharge-pending');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function clientBalanceView($settingable_type = null, $settingable_id = null)
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

        
        return view('admin.mybalance.view_client_balance',compact('data'));
    }

    public function clientBalanceData()
    {
        $clientBalance = ClientBalance::join('users', 'users.id', '=', 'client_balances.client_id')
            ->select('users.id', 'users.name', 'client_balances.balance')->latest('client_balances.created_at', 'desc')->get();

        return response()->json(['data' => $clientBalance]);
    }

    public function accept($id)
    {
        $user = ClientRecharge::find($id);

        if ($user) {
            $user->update([
                'status' => 'approved'
            ]);
            return response()->json(['status' => 'success', 'message' => 'Freezed successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'ID Not Found!']);
        }
    }

    public function reject($id)
    {
        $user =ClientRecharge::find($id);

        if ($user) {
            $user->update([
                'status' => 'rejected'
            ]);
            return response()->json(['status' => 'success', 'message' => 'Unfreezed successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'ID Not Found!']);
        }
    }


    public function getCoinPrice(Request $request)
    {
        $coinSymbol = $request->input('coin');
        if($coinSymbol==1){
            $coin= "tether";
        }
        elseif ($coinSymbol == 2) {
            $coin = "bitcoin";
        }
        elseif ($coinSymbol == 3) {
            $coin = "ethereum";
        }

        $response = Http::get("https://api.coincap.io/v2/assets/{$coin}");


        $currentCoinValue = $response->json('data.priceUsd');




       

        return response()->json(['currentCoinValue' => $currentCoinValue]);
    }
}