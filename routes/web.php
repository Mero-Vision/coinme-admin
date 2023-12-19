<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClientBalanceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CryptoCurrencyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\IDVerificationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\UserController;
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

Route::get('/', [IndexController::class, 'index']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register-account', [UserController::class, 'registerIndex']);
Route::post('register-account', [UserController::class, 'register']);
Route::get('/complete_registration', [UserController::class, 'emailVerified']);

Route::get('login/forgot-password', [ForgotPasswordController::class, 'index']);

Route::get('market',[MarketController::class,'index']);
Route::get('contact-us',[ContactController::class,'publicIndex']);

Route::get('about-us', [AboutController::class, 'publicIndex']);

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
        

        Route::group(['prefix' => 'admin/settings'], function () {
            Route::get('/', [SettingController::class, 'index']);
            Route::get('/app-settings', [SettingController::class, 'appSettingIndex']);
            Route::get('/change-password', [PasswordController::class, 'index']);
            Route::get('/about_us', [AboutController::class, 'viewAboutUsEdit']);

            Route::get('/admin/settings', [SiteSettingController::class, 'index']);
            Route::post('post', [SiteSettingController::class, 'store']);
        });

        Route::get('admin/profile', [ProfileController::class, 'index']);
        Route::get('admin/profile/edit-profile', [ProfileController::class, 'editProfileIndex']);
        Route::post('admin/profile/edit-profile/{id}', [ProfileController::class, 'updateProfile']);
        Route::get('admin/chat', [ChatController::class, 'index']);
        Route::get('admin/contact_us',[ContactController::class, 'adminIndex']);
        Route::get('admin/contact_us/data', [ContactController::class, 'contactDataAjax']);
        Route::get('admin/contact_us/data/delete/{id}', [ContactController::class, 'deleteContact']);

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
        Route::get('admin/users/load-balance/{id}', [ClientBalanceController::class, 'loadClientBalanceIndex']);
        Route::post('admin/users/load-balance', [ClientBalanceController::class, 'loadClientBalance']);
        Route::get('admin/users/client-balance', [ClientBalanceController::class, 'clientBalanceView']);
        Route::get('admin/users/client-balance/data', [ClientBalanceController::class, 'clientBalanceData']);


        

        
        
    }
);