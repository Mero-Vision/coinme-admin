<?php

namespace App\Http\Controllers;

use App\Models\TradeTransaction;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function tradeHistory()
    {
        return view('admin.order_record.trade_history');
    }

    public function tradeHistoryData()
    {

        $history = TradeTransaction::join('users', 'users.id', '=', 'trade_transactions.client_id')
        ->where('trade_transactions.trade_status','!=',null)->latest('trade_transactions.created_at','desc')->get();


        return response()->json(['data' => $history]);
    }
}