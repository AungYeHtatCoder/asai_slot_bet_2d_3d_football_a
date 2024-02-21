<?php

namespace App\Http\Controllers\Api\V1\Player;

use App\Helpers\WalletHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommonRequest;
use App\Http\Requests\Api\ExchangeMainRequest;
use App\Models\Admin\PlayerTransactionLogs;
use App\Models\User;
use App\Models\UserWallet;
use App\Traits\HttpResponses;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class WalletController extends Controller
{
    use HttpResponses;
    public function currentWallet()
    {
        $wallets = UserWallet::where('user_id', Auth::id())->first();
        return $this->success($wallets);
    }

    public function exchangeToMain(ExchangeMainRequest $request)
    {
        try {
            $inputs = $request->validated();
            $player =  Auth::user();
            $walletProperties = $this->walletProperties($inputs['p_code']);
            $inputs['refrence_id'] = $this->getRefrenceId();
            $inputs['user_id'] =  $player->id;
            if ($player->userWallet->{$walletProperties} < $inputs['cash_out']) {
                throw new Exception('Insufficienc Balance');
            }

            $result =  PlayerTransactionLogs::create($inputs);

            return $this->success($result);
        } catch (Exception $exception) {
            return $this->error('', $exception->getMessage(), 401);
        }
    }
    private function getRefrenceId($prefix = 'REF')
    {
        return  uniqid($prefix);
    }

    private function walletProperties($p_code)
    {
        $walletProperties =   [
            'AG' => 'ag_wallet',
            'GB' => 'gb_wallet',
            'G8' => 'g8_wallet',
            'JK' => 'jk_wallet',
            'JD' => 'jd_wallet',
            'L4' => 'l4_wallet',
            'K9' => 'k9_wallet',
            'PG' => 'pg_wallet',
            'PR' => 'pr_wallet',
            'RE' => 're_wallet',
            'S3' => 's3_wallet',
        ];

        return $walletProperties[$p_code] ?? null;
    }
    private function updateUserBalance($inputs, $player): void
    {
        $player->balance += $inputs['amount'];
        $player->save();
    }
    private function updateUserWallet($inputs, $player): void
    {
        $this->walletProperties($inputs['p_code']);
        $playerWallet = UserWallet::where('user_id', $player->id)->first();
        $playerWallet->{$this->walletProperties($inputs['p_code'])} -= $inputs['amount'];
        $playerWallet->update();
    }
}
