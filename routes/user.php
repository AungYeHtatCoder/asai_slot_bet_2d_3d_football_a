<?php


use App\Http\Controllers\Admin\CashInRequestController;
use App\Http\Controllers\Admin\CashOutRequestController;
use App\Http\Controllers\User\GameController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;





// Route::get('/', [UserController::class, 'index'])->name('slot.index');

// Route::group(['prefix' => 'user'], function () {
//     Route::get('login',[LoginController::class,'showLogin'])->name('user.showLogin');
//     Route::post('user-login',[LoginController::class,'login'])->name('user.login');
//     Route::get('promo', [UserController::class, 'promotion'])->name('user.promotion');
//     Route::get('helpcenter', [UserController::class, 'helpCenter'])->name('user.help_center');
//     Route::get('/gamelist/{provider_id}/game_type/{game_type_id}',
//     [GameController::class, 'getGameList'])->name('user.gamelist');


//     Route::middleware(['auth'])->group(function () {
//         Route::get('agent', [UserController::class, 'agent'])->name('agent');
//         Route::get('user-userinfo', [UserController::class, 'userInfo'])->name('user.user_info');
//         Route::get('wallet', [UserController::class, 'wallet'])->name('user.wallet');
//         Route::get('betrecord', [UserController::class, 'betRecord'])->name('user.bet_record');
//         Route::get('cashrecord', [UserController::class, 'cashRecord'])->name('user.cash');
//         Route::get('feedback', [UserController::class, 'feedback'])->name('user.feedback');
//         Route::get('game-details', [UserController::class, 'asiagaming'])->name('user.game_detail');
        
//         Route::get('/launchGame/{id}', [GameController::class, 'launchGame'])->name('user.launchGame');
//         Route::get('/directGame/{provider_id}/game_type/{game_type_id}',
//             [GameController::class, 'directGame'])->name('user.directGame');
//         Route::post('/deposit-request', [CashInRequestController::class, 'deposit'])->name('deposit');
//         Route::post('/withdraw-request', [CashOutRequestController::class, 'withdraw'])->name('withdraw');    
        
//     });
   
// });
