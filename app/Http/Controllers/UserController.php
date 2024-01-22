<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateClientRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Mail\UserVerificationMail;
use App\Models\ClientBalance;
use App\Models\CryptoCurrency;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users');
    }

    public function userDataAjax()
    {
        $user = User::where('status', '!=', 'admin')->latest()->get();
        return response()->json(['data' => $user]);
    }

    public function addUserIndex()
    {
        return view('admin.add_user');
    }

    public function viewUserData(Request $request, $id)
    {

        $user = User::find($id);



        $usdt = CryptoCurrency::where('name', 'USDT')->first();
        $btc = CryptoCurrency::where('name', 'Bitcoin')->first();
        $etc = CryptoCurrency::where('name', 'Etherium')->first();

        $usdtBalance = ClientBalance::join(
            'crypto_currencies',
            'crypto_currencies.id',
            '=',
            'client_balances.currency_id'
        )->where('client_balances.client_id', $user->id)
            ->where('client_balances.currency_id', $usdt->id)
            ->select(
                'client_balances.balance',
                'crypto_currencies.name',
                'crypto_currencies.symbol',
                'client_balances.wallet_address'

            )->first();


        $btcBalance = ClientBalance::join(
            'crypto_currencies',
            'crypto_currencies.id',
            '=',
            'client_balances.currency_id'
        )->where('client_balances.client_id', $user->id)
            ->where('client_balances.currency_id', $btc->id)
            ->select(
                'client_balances.balance',
                'crypto_currencies.name',
                'crypto_currencies.symbol',
                'client_balances.wallet_address'

            )->first();

        $etcBalance = ClientBalance::join(
            'crypto_currencies',
            'crypto_currencies.id',
            '=',
            'client_balances.currency_id'
        )->where('client_balances.client_id', $user->id)
            ->where('client_balances.currency_id', $etc->id)
            ->select(
                'client_balances.balance',
                'crypto_currencies.name',
                'crypto_currencies.symbol',
                'client_balances.wallet_address'

            )->first();
        
        return view('admin.view_user_data', compact('user', 'btcBalance', 'usdtBalance', 'etcBalance'));
    }

    public function save(CreateUserRequest $request)
    {
        $request->validate([]);
        try {
            $user = DB::transaction(function () use ($request) {
                $user = User::create(
                    [
                        'name' => $request->name,
                        'mobile_no' => $request->mobile_no,
                        'email' => $request->email,
                        'address' => $request->address,
                        'gender' => $request->gender,
                        'password' => Hash::make($request->password),
                        'status' => 'client'

                    ]
                );
                $user->assignRole(User::CLIENT);
                $token = Str::random(60);

                DB::table('password_resets')->insert([
                    'email' => $user->email,
                    'token' => $token,
                    'created_at' => now(),
                ]);

                Mail::to($request->email)->send(new UserVerificationMail($user, $token));
                return $user;
            });
            if ($user) {
                sweetalert()->addSuccess('Verification email has been send to your email!');
                return back();
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function emailVerified(Request $request)
    {

        $token = request()->query('token');

        if (!$token) {
            sweetalert()->addWarning('Invalid Token!');
        }

        $passwordReset = PasswordReset::where('token', $token)->first();

        if (!$passwordReset) {
            sweetalert()->addWarning('Token Not Found!');
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            sweetalert()->addWarning('User Not Found!');
        }

        try {
            DB::transaction(function () use ($user, $request, $token) {
                $user->email_verified_at = now();
                $user->save();
                PasswordReset::where('token', $token)->delete();
            });
            sweetalert()->addSuccess('User is verified successfully!');
            return redirect('/');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function registerIndex()
    {
        return view('register_account');
    }

    public function register(CreateClientRequest $request)
    {

        try {
            $client = DB::transaction(function () use ($request) {
                $client = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    // 'id_number' => $request->id_number,
                    'mobile_no' => $request->mobile_no,
                    'status' => 'client'

                ]);

                $currency = CryptoCurrency::get();
                foreach ($currency as $data) {
                    ClientBalance::create([
                        'client_id' => $client->id,
                        'balance' => 0,
                        'currency_id' => $data->id

                    ]);
                }


                // $client->addMedia($request->front_image)->toMediaCollection('front_image');
                // $client->addMedia($request->back_image)->toMediaCollection('back_image');
                // $client->addMedia($request->id_in_hand)->toMediaCollection('id_in_hand');

                $client->assignRole(User::CLIENT);

                return $client;
            });
            if ($client) {
                sweetalert()->addSuccess($request->name . ',your account is created successfully');
                return back();
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function freezeAccount($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->update([
                'is_frozen' => 'active'
            ]);
            return response()->json(['status' => 'success', 'message' => 'Freezed successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'ID Not Found!']);
        }
    }

    public function unfreezeAccount($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->update([
                'is_frozen' => 'inactive'
            ]);
            return response()->json(['status' => 'success', 'message' => 'Unfreezed successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'ID Not Found!']);
        }
    }

    public function approveClientDocument(Request $request)
    {

        $user = User::find($request->user_id);
        if (!$user) {
            return back()->with('User ID Not Found!');
        }
        $user->update(['verification_status'=>'verified']);
        return back()->with('success','User Document Approved Successfully!');
    }

    public function tradeStatusUpdate(Request $request){
        $user=User::find($request->client_id);
        if(!$user){
            return back()->with('error','User Not Found');
        }
        try{
            $user=DB::transaction(function()use($user,$request){
                $user->update([
                    'trade_status'=>$request->trade_status
                    
                ]);
                return $user;
                
            });
            if($user){
                return back()->with('success','Status updated successfully!');
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
            
        }
        
    }
}