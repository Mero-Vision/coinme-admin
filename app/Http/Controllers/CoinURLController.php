<?php

namespace App\Http\Controllers;

use App\Models\CoinURL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoinURLController extends Controller
{
    public function index()
    {
        $url = CoinURL::where('user_id', auth()->user()->id)->first();
        return view('admin.setting.coin_url', compact('url'));
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