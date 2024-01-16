<?php

namespace App\Http\Controllers;

use App\Http\Requests\Recharge\CreateRechargeRequest;
use App\Models\ClientRecharge;
use App\Models\Recharge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RechargeController extends Controller
{
    public function index()
    {
        return view('admin.mybalance.quick_recharge');
    }

    public function viewRechargePending()
    {
        return view('admin.mybalance.view_recharge_pending');
    }

    public function rechargePendingData()
    {
        $rechargePending = ClientRecharge::with('media')->where('status','=','pending')->latest()->get();

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
}