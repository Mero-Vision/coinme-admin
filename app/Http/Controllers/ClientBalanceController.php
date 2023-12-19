<?php

namespace App\Http\Controllers;

use App\Http\Requests\Recharge\CreateLoadMoneyRequest;
use App\Models\ClientBalance;
use App\Models\Recharge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientBalanceController extends Controller
{
    public function index(){
        
        $user = Auth::user();
        $clientBalance = ClientBalance::where('client_id', $user->id)->first();
        return view('admin.mybalance.view_balance',compact('clientBalance'));
        
    }

    public function loadClientBalanceIndex($client_id){
        
        $clientBalance=ClientBalance::where('client_id',$client_id)->first();
        if(!$clientBalance){
            sweetalert()->addWarning('Client Balance ID Not Found!');
            return back();
        }
        $rechargeRequest = Recharge::where('client_id', $client_id)->where('recharge_status', 'not_done')->first();
        $client=User::find($client_id);

        $rechargeHistory= Recharge::join('users', 'users.id', '=', 'recharges.client_id')->select('users.name', 'recharges.recharge_amount')->
        where('recharge_status','recharged')->latest('recharges.created_at','desc')->limit(10)->get();
        
        return view('admin.mybalance.load_coin',compact('clientBalance','client', 'rechargeRequest', 'rechargeHistory'));
    }


    
    public function loadClientBalance(CreateLoadMoneyRequest $request){

        $clientID=$request->client_id;
        $clientBalance = ClientBalance::where('client_id', $clientID)->first();

        $rechargeRequest=Recharge::find($request->recharge_id);
        try{
            $balance=DB::transaction(function()use($clientBalance,$request, $rechargeRequest){
                $newBalance = $clientBalance->balance + $request->recharge_amount;
                $clientBalance->update([
                    
                    'balance' => $newBalance,
                ]);
                $rechargeRequest->update([
                    'recharge_status'=>'recharged'
                    
                ]);
                return $clientBalance;
            });
            if($clientBalance){
                sweetalert()->addSuccess('You have loaded the amount to client successfully!');
                return redirect('admin/users/view-recharge-pending');
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
            
        }

        
        
    }

    public function clientBalanceView(){
        return view('admin.mybalance.view_client_balance');
    }

    public function clientBalanceData()
    {
        $clientBalance = ClientBalance::join('users','users.id','=', 'client_balances.client_id')
        ->select('users.id','users.name', 'client_balances.balance')->latest('client_balances.created_at','desc')->get();

        return response()->json(['data'=>$clientBalance]);
    }
}