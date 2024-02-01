<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index($settingable_type = null, $settingable_id = null){

      
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
        return view('admin.analytics.analytics', compact('data'));
    }

    public function clientgeoAnalytics($settingable_type = null, $settingable_id = null){

        $result = VisitorLog::select(
            "country_name",
            DB::raw("COUNT(id) as total"))->groupBy('country_name')->get();
        $data720 = "";
        foreach ($result as $val) {
            $data720 .= "['" . $val->country_name . "'," . $val->total . " ],";
        }
        $chartdata = $data720;

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

        
        return view('admin.analytics.client_geo_analytics',compact('chartdata','data'));
    }
}