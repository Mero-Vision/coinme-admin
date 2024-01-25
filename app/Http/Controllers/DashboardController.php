<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $clients=User::latest()->get();
       

            
        return view('admin.dashboard',compact('clients'));
    }
}