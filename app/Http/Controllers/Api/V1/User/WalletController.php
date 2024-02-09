<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\UserWallet;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    use HttpResponses;
    public function wallet()
    {
        $wallets = UserWallet::with('user')->where('user_id', Auth::id())->first();
        
        return $this->success($wallets);
    }
}
