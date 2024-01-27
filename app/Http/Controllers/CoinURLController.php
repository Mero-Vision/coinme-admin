<?php

namespace App\Http\Controllers;

use App\Models\CoinURL;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoinURLController extends Controller
{
    public function index($settingable_type = null, $settingable_id = null)
    {
        $url = CoinURL::where('user_id', auth()->user()->id)->first();

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
       


        return view('admin.setting.coin_url', compact('url','data'));
    }

    public function store(Request $request)
    {
        $url = CoinURL::where('user_id', auth()->user()->id)->first();
        try {
            $url = DB::transaction(function () use ($request, $url) {

                if ($url) {
                    $url->update([
                        'usdt_coin_url' => $request->usdt_coin_url,
                        'btc_coin_url' => $request->bitcoin_coin_url,
                        'description' => $request->description,
                        'eth_coin_url' => $request->eth_coin_url,

                    ]);
                } else {
                    $url = CoinURL::create([
                        'user_id' => auth()->user()->id,
                        'usdt_coin_url' => $request->usdt_coin_url,
                        'btc_coin_url' => $request->bitcoin_coin_url,
                        'eth_coin_url' => $request->eth_coin_url,
                        'description' => $request->description

                    ]);
                }

                return $url;
            });
            if ($url) {
                return back()->with('success', 'URL created successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}