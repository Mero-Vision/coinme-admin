<?php

namespace App\Http\Controllers;

use App\Http\Requests\CryptoCurrency\CreateCryptoCurrencyRequest;
use App\Models\CryptoCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CryptoCurrencyController extends Controller
{
    public function index(){
        return view('admin.cryptocurrency.create_crypto');
    }

    public function viewCryptoIndex(){
        return view('admin.cryptocurrency.view_crypto_currency');
    }

    public function cryptoData(){
        $crypto=CryptoCurrency::latest()->get();
        
        return response()->json(['data'=>$crypto]);
    }

    public function deleteCrypto($id)
    {
        $crypto = CryptoCurrency::find($id);

        if ($crypto) {
            $crypto->delete();
            return response()->json(['status' => 'success', 'message' => 'Crypto deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Contact Not Found!']);
        }
    }

    public function viewCryptoData(Request $request, $id)
    {

        $crypto = CryptoCurrency::find($id);
        return view('admin.cryptocurrency.edit_crypto', compact('crypto'));
    }

    public function save(CreateCryptoCurrencyRequest $request){

        try{
            $crypto=DB::transaction(function()use($request){
                $crypto=CryptoCurrency::create([
                    'name'=>$request->name,
                    'symbol'=>$request->symbol,
                    'price'=>$request->price,
                    'market_capital'=>$request->market_capital
                    
                ]);
                return $crypto;
                
            });
            if($crypto){
                sweetalert()->addSuccess($request->name .' currency created successfully!');
                return back();
            }
            
        }
        catch(\Throwable $th){
            return back()->with('error',$th->getMessage());
        }
        
    }

    public function update(Request $request){
        $crypto = CryptoCurrency::find($request->id);
        if(!$crypto){
            sweetalert()->addWarning('Crypto ID Not Found!');
            return back();
        }
        try {
            $crypto = DB::transaction(function () use ($request,$crypto) {
                $crypto->update([
                    'name' => $request->name,
                    'symbol' => $request->symbol,
                    'price' => $request->price,
                    'market_capital' => $request->market_capital

                ]);
                return $crypto;
            });
            if ($crypto) {
                sweetalert()->addSuccess($request->name . ' currency data updated successfully!');
                return back();
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
        
    }
}