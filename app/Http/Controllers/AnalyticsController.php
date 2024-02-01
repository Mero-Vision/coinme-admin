<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index(){
        return view('admin.analytics.analytics');
    }

    public function clientgeoAnalytics(){
        return view('admin.analytics.client_geo_analytics');
    }
}