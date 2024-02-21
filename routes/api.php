<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\GameController;
use App\Http\Controllers\Api\V1\BannerController;
use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Bank\BankController;
use App\Http\Controllers\Api\V1\PromotionController;
use App\Http\Controllers\Api\V1\Player\WalletController;
use App\Http\Controllers\Api\V1\Player\DepositController;
use App\Http\Controllers\Api\V1\Player\PlayerTransactionLogController;
use App\Http\Controllers\Api\V1\Player\WithDrawController;
use App\Http\Controllers\Api\V1\User\GameController as UserGameController;
use App\Http\Controllers\Api\V1\User\PlayerTransfer\PlayerTransferToGameWalletController;

//login route post
Route::post('/login', [AuthController::class, 'login']);
Route::get('promotion', [PromotionController::class, 'index']);
Route::get('banner', [BannerController::class, 'index']);
Route::get('hotgame', [GameController::class, 'hotgame']);
Route::get('providers', [GameController::class, 'providers']);
Route::get('/gameTypes', [UserGameController::class, 'gameTypes']);
Route::get('/gameTypeProviders/{id}', [UserGameController::class, 'gameTypeProviders']);
Route::get('v1/validate',[AuthController::class,'callback']);


Route::group(["middleware" => ['auth:sanctum']], function () {
    //logout
    Route::get('user', [AuthController::class, 'getUser']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('changePassword', [AuthController::class, 'changePassword']);
    Route::post('profile', [AuthController::class, 'profile']);

    //game lists
    Route::get('/gamedetail/{provider_id}/game_type/{game_type_id}', [GameController::class, 'getGameDetail']);
    Route::get('gamelist', [GameController::class, 'gameList']);
    Route::get('game-log',[GameController::class,'gameLog']);

    Route::get('/launchGame/{id}', [GameController::class, 'launchGame'])->name('user.launchGame');
    Route::get(
        '/directGame/{provider_id}/game_type/{game_type_id}',
        [GameController::class, 'directGame']
    )->name('user.directGame');
    //lists
    Route::group(['prefix' => 'wallet'], function () {
        Route::get('currentWallet', [WalletController::class, 'currentWallet']);
        Route::post('exchangeToMain', [WalletController::class, 'exchangeToMain']);
    });

    Route::group(['prefix' => 'transaction'], function () {
        Route::post('deposit', [DepositController::class, 'deposit']);
        Route::post('withdraw',[WithDrawController::class,'withdraw']);
        Route::get('player-transactionlog',[PlayerTransactionLogController::class,'index']);
        //amk transaction route
        Route::post('/play-slot-game', [PlayerTransferToGameWalletController::class, 'playSlotGame'])
            ->name('play-slot-game');
    });

    Route::group(['prefix' => 'bank'], function () {
        Route::get('all', [BankController::class, 'all']);
    });
});
