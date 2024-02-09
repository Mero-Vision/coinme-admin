<?php

namespace App\Http\Controllers;

use App\Models\ClientBalance;
use App\Models\ClientRechargeHistory;
use App\Models\CryptoCurrency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrozenAmountController extends Controller
{
    public function index(){
       
        return view('admin.frozen_amount.frozen_amount');
    }

    public function frozenAmountUserData(){

        $frozenAmmountUsers = ClientBalance::join('users', 'users.id', '=', 'client_balances.client_id')
            ->join('crypto_currencies', 'crypto_currencies.id', '=', 'client_balances.currency_id')
            ->select('users.name as username', 'client_balances.id', 'client_balances.frozen_amount', 
            'crypto_currencies.name')->where('client_balances.frozen_amount','!=',null)-> where('client_balances.frozen_amount', '!=', 0)->get();

        return response()->json(['data' => $frozenAmmountUsers]);

    }

    public function loadFrozenAmountIndex($id){
        
        $clientBalance=ClientBalance::join('crypto_currencies', 'crypto_currencies.id',
        '=', 'client_balances.currency_id')->where('client_balances.id',$id)
        ->select('client_balances.frozen_amount', 'client_balances.id',
         'crypto_currencies.name', 'crypto_currencies.symbol',
            'client_balances.client_id')->first();
        if(!$clientBalance){
            return back()->with('error','ID Not Found!');
        }
        $user=User::find($clientBalance->client_id);
        $currency = CryptoCurrency::get();
        return view('admin.frozen_amount.load_frozen_amount',compact('clientBalance','currency', 'user'));
    }

    public function loadMoney(Request $request){


        $clientBalance = ClientBalance::find($request->client_balance_id);

        try {
            $balance = DB::transaction(function () use ($clientBalance, $request) {
                $newBalance = $clientBalance->dollar_balance + $request->recharge_amount;
                $newFrozenBalance=$clientBalance->frozen_amount-$request->recharge_amount;
                $clientBalance->update([

                    'dollar_balance' => $newBalance,
                    'frozen_amount'=>$newFrozenBalance
                ]);
               
                // ClientRechargeHistory::create([
                //     'client_id' => $clientBalance->client_id,
                //     'client_name' => $request->client_name,
                //     'coin_type' => $request->currency_name,
                //     'coin_value' => $request->coin_value,
                //     'recharge_amount' => $request->recharge_amount,
                //     'equivalent_coin_amount' => "",

                // ]);

               

                return $clientBalance;
            });
            if ($clientBalance) {
                
                sweetalert()->addSuccess('You have loaded the amount to client successfully!');
                return redirect('admin/frozen-account/view');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
        
    
}