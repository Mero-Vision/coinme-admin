<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryTime\DeliveryTimeCreateRequest;
use App\Models\DeliveryTime;
use App\Models\MarginPercent;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryTimeController extends Controller
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

        
        return view('admin.delivery_time.delivery_time',compact('data'));
    }

    public function create($settingable_type = null, $settingable_id = null)
    {
        $deliveryTime = DeliveryTime::latest()->get();
        $marginPercent=MarginPercent::get();

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
        return view('admin.delivery_time.create_delivery_time', compact('deliveryTime', 'marginPercent','data'));
    }

    public function deliveryDataAjax()
    {
        $deliveryTime = DeliveryTime::join('margin_percents', 'margin_percents.id', '=', 
        'delivery_times.margin_percent_id')
        ->select('delivery_times.id', 
        'delivery_times.delivery_time', 
        'delivery_times.status',
            'margin_percents.margin_percent')->get();
        return response()->json(['data' => $deliveryTime]);
    }

    public function store(DeliveryTimeCreateRequest $request)
    {

        try {
            $time = DB::transaction(function () use ($request) {
                $time = DeliveryTime::create([
                    'user_id' => auth()->user()->id,
                    'delivery_time' => $request->delivery_time,
                    'margin_percent_id'=>$request->margin_percent_id

                ]);
                return $time;
            });
            if ($time) {
                return back()->with('success', 'Delivery Time Created Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id, $settingable_type = null, $settingable_id = null){
        
        $deliveryTime=DeliveryTime::find($id);
        $marginPercent = MarginPercent::get();
        $deliveryTimes = DeliveryTime::latest()->get();
        if(!$deliveryTime){
            return back()->with('Delivery Time Not Found');
        }

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
        return view('admin.delivery_time.edit_delivery_time',compact('deliveryTime', 'marginPercent', 'deliveryTimes','data'));
        
    }

    public function update(Request $request)
    {
        $request->validate([
            'delivery_time' => ['required', 'numeric', 'max:220']

        ]);

        $deliveryTime = DeliveryTime::find($request->delivery_id);
        if (!$deliveryTime) {
            return back()->with('error', 'Delivery Time Not Found');
        }

        try {
            $deliveryTime = DB::transaction(function () use ($request, $deliveryTime) {
                $deliveryTime->update([
                    'delivery_time' => $request->delivery_time,
                    'margin_percent_id'=>$request->margin_percent_id

                ]);
                return $deliveryTime;
            });
            if ($deliveryTime) {
                return redirect('admin/delivery-time')->with('success', 'Delivery Time Updated Successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        
    }

    public function destroy($id)
    {
        $time = DeliveryTime::find($id);

        if ($time) {
            $time->delete();
            return response()->json(['status' => 'success', 'message' => 'Time deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Time Not Found!']);
        }
    }
}