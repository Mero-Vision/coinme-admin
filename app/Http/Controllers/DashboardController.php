<?php

namespace App\Http\Controllers;

use App\Models\ClientBalance;
use App\Models\ContactUs;
use App\Models\TradeTransaction;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $clients=User::where('status','!=','admin')->latest()->get();
        $totalClients=User::where('status', '!=', 'admin')->count();
        $totalTransactions = TradeTransaction::count();
        $totalContactUs = ContactUs::count();
        $clientBalance=ClientBalance::sum('balance');
       

            
        return view('admin.dashboard',compact('clients', 'totalClients', 'totalTransactions', 'totalContactUs', 'clientBalance'));
    }
}