<?php

namespace App\Http\Controllers\Api\V1\Player;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DepositRequest;
use App\Models\Admin\PlayerTransactionLogs;
use App\Models\Admin\PlayerTransferLog;
use App\Models\CashInRequest;
use App\Models\User;
use App\Models\UserWallet;
use App\Services\ApiService;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Throwable;

class DepositController extends Controller
{
    use HttpResponses;

    protected $apiService;
    protected $operatorCode;
    protected $secretKey;
    protected $backendPassword;
    protected $deposit;


    public function __construct(ApiService $apiService)
    {

        $this->apiService = $apiService;
        $this->operatorCode = config('common.operatorcode');
        $this->secretKey  = config('common.secret_key');
        $this->backendPassword  = config('common.backend_password');
        $this->deposit  = config('common.deposit');
    }

    public function deposit(DepositRequest $request)
    {

        try {
            $user = Auth::user();
            $refrence_id = $this->getRefrenceId();
            $inputs = array_merge($request->validated(), ['refrence_id' => $refrence_id, 'user_id' => $user->id]);
            if ($inputs['cash_in'] > $user->balance) {
                return $this->error('', 'Insuffience Balance', 401);
            }
                PlayerTransactionLogs::create($inputs);

                return $this->success('Deposit success');
            
        } catch (Exception $e) {

            return $this->error('', $e->getMessage(), 401);
        }
    }
    private function updatePlayerBalance($inputs, $user): void
    {
        $user->balance -= $inputs['cash_in'];
        $user->save();
    }
    private function updateUserWallet($inputs): void
    {
        $player = Auth::user();
        $walletProperties = $this->walletProperties($inputs['p_code']);
        $newValue = $player->userWallet->$walletProperties + $inputs['cash_in'];
        $wallet = $player->userWallet->wallet - $inputs['cash_in'];
        $player->userWallet->update([
            $this->walletProperties($inputs['p_code']) => $newValue,
            'wallet' => $wallet
        ]);
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

    private function getRefrenceId($prefix = 'REF')
    {
        return  uniqid($prefix);
    }

    public function statusChange(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1,2,3',
        ]);
        CashInRequest::find($id)->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status Changed Successfully');
    }
}
