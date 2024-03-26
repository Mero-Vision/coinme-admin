<?php

namespace App\Http\Controllers;

use App\Models\ClientBalance;
use App\Models\ClientRechargeHistory;
use App\Models\ContactUs;
use App\Models\SiteSetting;
use App\Models\TradeTransaction;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($settingable_type = null, $settingable_id = null){

        $thirtyDaysAgo = Carbon::now()->subDays(30);

        $clients = User::where('status', '!=', 'admin')
            ->whereDate('created_at', '>=', $thirtyDaysAgo)
            ->latest()
            ->get();
            
        $totalClients=User::where('status', '!=', 'admin')->count();
        $totalTransactions = TradeTransaction::count();
        $totalContactUs = ContactUs::count();
        $clientBalance=ClientBalance::sum('dollar_balance');

        $todayRecharge = ClientRechargeHistory::whereDate('created_at', Carbon::today())->sum('recharge_amount');

        $yesterdayRecharge = ClientRechargeHistory::whereDate('created_at', Carbon::yesterday())->sum('recharge_amount');

        $sevenDaysAgo = Carbon::now()->subDays(7);

        $lastSevenDaysRecharge = ClientRechargeHistory::where('created_at', '>=', $sevenDaysAgo)
        ->sum('recharge_amount');

        $fifteenDaysAgo = Carbon::now()->subDays(15);

        $lastFifteenDaysRecharge = ClientRechargeHistory::where('created_at', '>=', $fifteenDaysAgo)
        ->sum('recharge_amount');

        $thirtyDaysAgo = Carbon::now()->subDays(30);

        $frozenAmount = ClientBalance::where('created_at', '>=', $thirtyDaysAgo)
        ->sum('frozen_amount');

        $totalClientsToday = User::where('status', '!=', 'admin')
        ->whereDate('created_at', Carbon::today())
        ->count();

       

        

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
       

            
        return view('admin.dashboard',compact('clients', 
        'totalClients', 'totalTransactions', 'totalContactUs', 'clientBalance','data',
            'todayRecharge',
            'yesterdayRecharge',
            'lastSevenDaysRecharge',
            'lastFifteenDaysRecharge',
            'frozenAmount',
            'totalClientsToday'));
    }
}