<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\V1\GameController;
use App\Http\Controllers\Api\V1\BannerController;
use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\PromotionController;
use App\Http\Controllers\Api\V1\User\WalletController;
use App\Http\Controllers\Api\V1\User\PlayerTransfer\PlayerTransferToGameWalletController;




//login route post
Route::post('/login', [AuthController::class, 'login']);
Route::get('promotion',[PromotionController::class,'index']);
Route::get('/promotion/{id}', [PromotionController::class,'show']);
Route::get('banner',[BannerController::class,'index']);

Route::group(["middleware" => ['auth:sanctum']], function () {
    //logout
    Route::get('user', [AuthController::class, 'getUser']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('changePassword',[AuthController::class,'changePassword']);

    //game lists
    Route::get('/launchGame/{id}', [GameController::class, 'launchGame'])->name('user.launchGame');
    Route::get('/directGame/{provider_id}/game_type/{game_type_id}',[GameController::class, 'directGame'])->name('user.directGame');
    //game wallets
    Route::get('/wallet', [WalletController::class, 'wallet']);
    Route::get('/get-player-wallet-provider-code', [PlayerTransferToGameWalletController::class, 'showPlaySlotGameForm'])->name('get-play-slot-game');
    Route::post('/play-slot-game', [PlayerTransferToGameWalletController::class, 'playSlotGame'])->name('play-slot-game');
});

Route::get('/providerCodes/{gameTypeID}', [\App\Http\Controllers\Api\V1\User\GameController::class, 'providerCodeByGameType']);
Route::get('gamelist',[GameController::class,'gameList']);
Route::get('/gamedetail/{provider_id}/game_type/{game_type_id}',[GameController::class, 'getGameDetail']);