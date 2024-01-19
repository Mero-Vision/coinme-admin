<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryTime\DeliveryTimeCreateRequest;
use App\Models\DeliveryTime;
use App\Models\MarginPercent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryTimeController extends Controller
{
    public function index()
    {
        return view('admin.delivery_time.delivery_time');
    }

    public function create()
    {
        $deliveryTime = DeliveryTime::latest()->get();
        $marginPercent=MarginPercent::get();
        return view('admin.delivery_time.create_delivery_time', compact('deliveryTime', 'marginPercent'));
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