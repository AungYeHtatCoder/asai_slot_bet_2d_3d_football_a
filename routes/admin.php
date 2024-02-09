<?php

use App\Http\Controllers\Admin\Agent\AgentController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BannerTextController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\GameType\GameTypeController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\Player\PlayerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\Report\ReportController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\TransferLog\TransferLogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\WithDraw\WithDrawRequestController;
use Illuminate\Support\Facades\Route;




Route::group([
    'prefix' => 'admin', 'as' => 'admin.',
    'middleware' => ['auth', 'checkBanned']
], function () {
    
    Route::post('balance-up', [HomeController::class, 'balanceUp'])->name('balanceUp');

    // Permissions
    Route::resource('permissions', PermissionController::class);
    // Roles
    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);
    // Players
    Route::delete('user/destroy', [PlayerController::class, 'massDestroy'])->name('user.massDestroy');

        Route::put('player/{id}/ban', [PlayerController::class, 'banUser'])->name('player.ban');
        Route::resource('player', PlayerController::class);
        Route::get('player-cash-in/{player}',[PlayerController::class,'getCashIn'])->name('player.getCashIn');
        Route::post('player-cash-in/{player}',[PlayerController::class,'makeCashIn'])->name('player.makeCashIn');
        Route::get('player/cash-out/{player}', [PlayerController::class, 'getCashOut'])->name('player.getCashOut');
        Route::post('player/cash-out/update/{player}', [PlayerController::class, 'makeCashOut'])
            ->name('player.makeCashOut');
        Route::get('player/transer-detail/{player}', [PlayerController::class, 'getTransferDetail'])
            ->name('player.getTransferDetail');
    
    
    Route::get('profile', [ProfileController::class,'index'])->name('profile.index');
    Route::post('profile/change-password/{user}',[ProfileController::class,'updatePassword'])
            ->name('profile.updatePassword');
   


    // user profile route get method
    Route::put('/change-password', [ProfileController::class, 'newPassword'])->name('changePassword');
    // PhoneAddressChange route with auth id route with put method
    Route::put('/change-phone-address', [ProfileController::class, 'PhoneAddressChange'])->name('changePhoneAddress');
    Route::put('/change-kpay-no', [ProfileController::class, 'KpayNoChange'])->name('changeKpayNo');
    Route::put('/change-join-date', [ProfileController::class, 'JoinDate'])->name('addJoinDate');
    Route::resource('banners', BannerController::class);
    Route::resource('games', GameController::class);
    Route::resource('text', BannerTextController::class);
    Route::resource('/promotions', PromotionController::class);
    Route::resource('/payments', PaymentController::class);

    Route::get('game-type-lists', [GameTypeController::class, 'index'])->name('game-type-lists');
    Route::resource('agent',AgentController::class);
    Route::get('agent-cash-in/{id}',[AgentController::class,'getCashIn'])->name('agent.getCashIn');
    Route::post('agent-cash-in/{id}',[AgentController::class,'makeCashIn'])->name('agent.makeCashIn');
    Route::get('agent/cash-out/{id}', [AgentController::class, 'getCashOut'])->name('agent.getCashOut');
    Route::post('agent/cash-out/update/{id}', [AgentController::class, 'makeCashOut'])
        ->name('agent.makeCashOut');
    Route::get('agent/transer-detail/{id}', [AgentController::class, 'getTransferDetail'])
        ->name('agent.getTransferDetail');
    Route::get('withdraw',[WithDrawRequestController::class,'index'])->name('agent.withdraw');
    Route::get('withdraw/{id}',[WithDrawRequestController::class,'show'])->name('agent.withdrawshow');

    Route::post('withdraw/{withdraw}',[WithDrawRequestController::class,'statusChange'])->name('agent.statusChange');

    Route::get('transer-log',[TransferLogController::class,'index'])->name('transferLog');
    Route::get('winlose-list/',[ReportController::class,'index'])->name('report.index');
    Route::get('winlose-provider-List',[ReportController::class,'providerList'])->name('report.providerList');
    Route::get('search/winlost-provider',[ReportController::class,'searchProviderList'])->name('report.searchProvider');
    Route::get('winlose-detail',[ReportController::class,'detail'])->name('report.detail');
    // 2 d 3 d route here 
});