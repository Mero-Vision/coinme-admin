<?php

namespace App\Http\Controllers;

use App\Models\ClientBalance;
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

        $clients=User::where('status','!=','admin')->latest()->get();
        $totalClients=User::where('status', '!=', 'admin')->count();
        $totalTransactions = TradeTransaction::count();
        $totalContactUs = ContactUs::count();
        $clientBalance=ClientBalance::sum('dollar_balance');

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
        'totalClients', 'totalTransactions', 'totalContactUs', 'clientBalance','data'));
    }
}