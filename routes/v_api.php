<?php

use App\Models\Admin\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Api\V1\User\PlayerTransfer\PlayerTransferToGameWalletController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();

// });
    Route::post('login', [UserController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {

      
    });


    Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'App\Http\Controllers\Api\V1\User',
    'middleware' => ['auth:sanctum', 'checkBanned']
], function () {

    Route::get('/play-slot-game', [PlayerTransferToGameWalletController::class, 'showPlaySlotGameForm'])
        ->name('show-play-slot-game-form');

    Route::post('/play-slot-game', [PlayerTransferToGameWalletController::class, 'playSlotGame'])
        ->name('play-slot-game');
    
});