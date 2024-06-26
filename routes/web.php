<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClientBalanceController;
use App\Http\Controllers\CoinURLController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CryptoCurrencyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryTimeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FrozenAmountController;
use App\Http\Controllers\IDVerificationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MarginPercentController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\TimezoneController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawalRecordController;
use App\Models\ClientBalance;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [IndexController::class, 'index']);

Route::get('/check-timezone', function () {
    return response()->json([
        'config_timezone' => config('app.timezone'),
        'default_timezone' => date_default_timezone_get(),
        'current_time' => now()->toDateTimeString(),
    ]);
});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register-account', [UserController::class, 'registerIndex']);
Route::post('register-account', [UserController::class, 'register']);
Route::get('/complete_registration', [UserController::class, 'emailVerified']);

Route::get('login/forgot-password', [ForgotPasswordController::class, 'index']);

// Route::get('market',[MarketController::class,'index']);
// Route::get('contact-us',[ContactController::class,'publicIndex']);

// Route::get('about-us', [AboutController::class, 'publicIndex']);

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('logout', [AuthController::class, 'logout']);

        Route::get('admin/dashboard', [DashboardController::class, 'index']);

        Route::get('admin/users', [UserController::class, 'index']);
        Route::get('admin/users/data', [UserController::class, 'userDataAjax']);
        Route::get('admin/users/add', [UserController::class, 'addUserIndex']);
        Route::post('admin/users/add', [UserController::class, 'save']);
        Route::get('admin/users/data/{id}', [UserController::class, 'viewUserData']);
        Route::get('admin/users/freeze/{id}', [UserController::class, 'freezeAccount']);
        Route::get('admin/users/unfreeze/{id}', [UserController::class, 'unfreezeAccount']);
        Route::get('admin/users/delete/{id}', [UserController::class, 'destroy']);
        Route::get('admin/users/client-balance/update', [ClientBalanceController::class, 'updateClientBalance']);
        

        Route::group(['prefix' => 'admin/settings'], function () {
            Route::get('/', [SettingController::class, 'index']);
            Route::get('/app-settings', [SettingController::class, 'appSettingIndex']);
            Route::get('/change-password', [PasswordController::class, 'index']);
            Route::get('/about_us', [AboutController::class, 'viewAboutUsEdit']);
            Route::get('/coin-url', [CoinURLController::class, 'index']);
            Route::post('/coin-url', [CoinURLController::class, 'store']);
            Route::get('/timezone', [TimezoneController::class, 'timzeZoneSettingIndex']);
            Route::post('/timezone/update', [TimezoneController::class, 'update']);

            Route::get('/admin/settings', [SiteSettingController::class, 'index']);
            Route::post('post', [SiteSettingController::class, 'store']);

            Route::post('/change-password',[SettingController::class, 'changepassword']);
        });

        Route::get('admin/profile', [ProfileController::class, 'index']);
        Route::post('admin/client/document/approve',[UserController::class, 'approveClientDocument']);
        Route::post('admin/client/document/reject', [UserController::class, 'rejectClientDocument']);
        Route::get('admin/profile/edit-profile', [ProfileController::class, 'editProfileIndex']);
        Route::post('admin/profile/edit-profile/{id}', [ProfileController::class, 'updateProfile']);
        Route::get('admin/contact_us',[ContactController::class, 'adminIndex']);
        Route::get('admin/contact_us/data', [ContactController::class, 'contactDataAjax']);
        Route::get('admin/contact_us/data/delete/{id}', [ContactController::class, 'deleteContact']);
        Route::post('client/trade-status/update',[UserController::class, 'tradeStatusUpdate']);

        Route::get('admin/email/send-email', [EmailController::class, 'sendEmailIndex']);
        Route::get('admin/email/send-email/data', [EmailController::class, 'sendEmailData']);
        Route::get('admin/email/send-email/data/view/{id}', [EmailController::class, 'viewSendEmail']);
        Route::get('admin/email/send-email/data/delete/{id}', [EmailController::class, 'deleteEmail']);
        Route::get('admin/email/compose',[EmailController::class, 'composeEmailIndex']);
        Route::post('admin/email/compose', [EmailController::class, 'sendEmail']);
        Route::get('admin/email/trash', [EmailController::class, 'viewTrash']);
        Route::get('admin/email/trash/data', [EmailController::class, 'trashData']);
        Route::get('admin/email/trash/delete/{id}', [EmailController::class, 'permanentDelete']);
        Route::get('admin/email/trash/restore/{id}', [EmailController::class, 'restoreDeletedEmail']);

        Route::get('admin/id_verification',[IDVerificationController::class,'index']);
        Route::post('admin/id_verification', [IDVerificationController::class, 'save']);

        Route::get('admin/crypto-currency/create',[CryptoCurrencyController::class,'index']);
        Route::get('admin/crypto-currency/view', [CryptoCurrencyController::class, 'viewCryptoIndex']);
        Route::get('admin/crypto-currency/data', [CryptoCurrencyController::class, 'cryptoData']);
        Route::get('admin/crypto-currency/delete/{id}', [CryptoCurrencyController::class, 'deleteCrypto']);
        Route::get('admin/crypto-currency/edit/{id}', [CryptoCurrencyController::class, 'viewCryptoData']);
        Route::post('admin/crypto-currency/update/', [CryptoCurrencyController::class, 'update']);
        Route::post('admin/crypto-currency/create', [CryptoCurrencyController::class, 'save']);


        Route::get('admin/mybalance',[ClientBalanceController::class,'index']);
        Route::get('admin/quick-recharge',[RechargeController::class,'index']);
        Route::post('admin/quick-recharge', [RechargeController::class, 'save']);
        Route::get('admin/users/view-recharge-pending', [RechargeController::class, 'viewRechargePending']);
        Route::get('admin/users/view-recharge-pending/data', [RechargeController::class, 'rechargePendingData']);
        Route::get('admin/users/recharge-history', [RechargeController::class, 'rechargeHistory']);
        Route::get('admin/users/recharge-history/data', [RechargeController::class, 'rechargeHistoryData']);
        Route::get('admin/users/recharge-clients', [RechargeController::class, 'viewRechargeForClients']);
        Route::get('admin/users/recharge-clients/data', [RechargeController::class, 'rechargeClientData']);
       
        
        Route::get('admin/users/load-balance/{id}', [ClientBalanceController::class, 'loadClientBalanceIndex']);
        Route::post('admin/users/load-balance', [ClientBalanceController::class, 'loadClientBalance']);
        Route::get('admin/users/client-balance', [ClientBalanceController::class, 'clientBalanceView']);
        Route::get('admin/users/client-balance/data', [ClientBalanceController::class, 'clientBalanceData']);
        Route::get('admin/users/recharge-clients/{id}', [ClientBalanceController::class, 'topupClient']);
        Route::post('admin/users/recharge-clients/load-coin', [ClientBalanceController::class, 'loadClientBalance2']);


        Route::get('admin/delivery-time',[DeliveryTimeController::class,'index']);
        Route::get('admin/delivery-time/create', [DeliveryTimeController::class, 'create']);
        Route::post('admin/delivery-time/create', [DeliveryTimeController::class, 'store']);
        Route::get('admin/delivery-time/delete/{id}', [DeliveryTimeController::class, 'destroy']);
        Route::get('admin/delivery-time/data', [DeliveryTimeController::class, 'deliveryDataAjax']);
        Route::get('admin/delivery-time/edit/{id}', [DeliveryTimeController::class, 'edit']);
        Route::post('admin/delivery-time/edit', [DeliveryTimeController::class, 'update']);

        Route::get('admin/client-recharge/accept/{id}', [ClientBalanceController::class, 'accept']);
        Route::get('admin/client-recharge/reject/{id}', [ClientBalanceController::class, 'reject']);

        Route::get('admin/trading/margin-percent',[MarginPercentController::class,'index']);
        Route::post('admin/trading/margin-percent', [MarginPercentController::class, 'store']);
        Route::get('admin/trading/margin-percent/edit/{id}', [MarginPercentController::class, 'edit']);
        Route::post('admin/trading/margin-percent/edit', [MarginPercentController::class, 'update']);
        Route::get('admin/trading/trade-history', [TradeController::class, 'tradeHistory']);
        Route::get('admin/trading/trade-history/data', [TradeController::class, 'tradeHistoryData']);
        Route::get('admin/trading/active-trading', [TradeController::class, 'activeTradeHistory']);


        Route::get('/get-coin-price', [ClientBalanceController::class, 'getCoinPrice']);

        Route::get('admin/order/pending-withdrawal-records', [WithdrawalRecordController::class, 'pendingWithdrawalRecordIndex']);
        Route::get('admin/order/pending-withdrawal-records/data', [WithdrawalRecordController::class, 'pendingWithdrawalRecordData']);
        Route::get('admin/order/pending-withdrawal-records/status/{id}', [WithdrawalRecordController::class, 'statusPaid']);
        Route::get('admin/order/pending-withdrawal-records/reject/{id}', [WithdrawalRecordController::class, 'rejectWithdraw']);


        Route::get('admin/frozen-account/view', [FrozenAmountController::class, 'index']);
        Route::get('admin/frozen-account/load-frozen-amount/{id}', [FrozenAmountController::class, 'loadFrozenAmountIndex']);
        Route::post('admin/frozen-account/load-frozen-amount', [FrozenAmountController::class, 'loadMoney']);
        Route::get('admin/frozen-account/view/data', [FrozenAmountController::class, 'frozenAmountUserData']);

        
        Route::get('admin/order/withdrawal-records',[WithdrawalRecordController::class,'index']);
        Route::get('admin/order/withdrawal-records/data', [WithdrawalRecordController::class, 'orderHistoryData']);


        Route::get('admin/chat', [ChatController::class, 'index']);
        Route::get('admin/chat/{sender_id}', [ChatController::class, 'show']);


        Route::get('admin/analytics',[AnalyticsController::class,'index']);
        Route::get('admin/analytics/client-geo-analytics', [AnalyticsController::class, 'clientgeoAnalytics']);
        Route::get('admin/analytics/client-recharge-analytics', [AnalyticsController::class, 'clientRechargeAnalytcis']);
       

       Route::get('admin/employees/view-employees',[EmployeeController::class, 'viewEmployees']);
        Route::get('admin/employees/add-employees', [EmployeeController::class, 'createEmployees']);
        Route::post('admin/employees/add-employees', [EmployeeController::class, 'store']);
        Route::get('admin/employees/add-employees/data', [EmployeeController::class, 'employeesData']);
        Route::get('admin/employees/delete/{id}', [EmployeeController::class, 'destroy']);
        Route::get('admin/employees/dashboard', [EmployeeController::class, 'employeeDashboard']);

        

        
        
    }
);