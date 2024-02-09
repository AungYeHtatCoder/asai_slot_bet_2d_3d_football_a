<?php

namespace App\Helpers;

use App\Models;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use PDOException;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\returnSelf;

class WalletHelper
{

    public static function getCurrentWallet($userId)
    {

        $res_wallet = DB::table('user_wallets')
            ->where('user_id', $userId)->first();

        if (!isset($res_wallet) || $res_wallet === null) {
            return array('resCode' => (int)'999', 'resDesc' => 'သက်ဆိုင်ရာအသုံးပြုသူ၏ယူနစ်အကောင့်မရှိသေးပါ။');
        }
        return $res_wallet;
    }
    public static function exchangeMaintoProvider($userId, $providerCode, $amount)
    {
        $res_wallet = DB::table('user_wallets')
            ->where('user_id', $userId)->get();

        if (!isset($res_wallet) || $res_wallet === null) {
            return array('resCode' => (int)'999', 'resDesc' => 'သက်ဆိုင်ရာအသုံးပြုသူ၏ယူနစ်အကောင့်မရှိသေးပါ။');
        }

        if ($res_wallet[0]->wallet < $amount) {
            return array('resCode' => (int)'999', 'resDesc' => 'ပင်မယူနစ် မလောက်ငှပါ။ပင်မယူနစ်ဖြည့်သွင်းပါရန်။');
        }

        $wallet_upt_qry = "update user_wallets set wallet= wallet - " . $amount . " , " . $providerCode . "_wallet = " . $providerCode . "_wallet + " . ($amount * config('app.wallet_config')[$providerCode]) . " , updated_at = now() where user_id = " . $userId;

        $updated_wallet = DB::statement($wallet_upt_qry);
        if ($updated_wallet) {
            $res_wallet = DB::table('user_wallets')
                ->where('user_id', $userId)->get();
            $updated_wallet = DB::statement("update users set balance = " . $res_wallet[0]->wallet . " where id = " . $res_wallet[0]->user_id);

            return $res_wallet;
        } else {
            return null;
        }
    }
    public static function exchangeProvidertoMain($userId,$providerCode, $amount)
    {
        
        $selqry = "select user_id, wallet, " . $providerCode . "_wallet as provider_amount from user_wallets where user_id = " . $userId;
        
       
        $res_wallet =  DB::select($selqry);
      
        if (!isset($res_wallet) || $res_wallet === null) {
            return array('resCode' => (int)'999', 'resDesc' => 'သက်ဆိုင်ရာအသုံးပြုသူ၏ယူနစ်အကောင့်မရှိသေးပါ။');
        }

        if ($res_wallet[0]->provider_amount < $amount) {
            return array('resCode' => (int)'999', 'resDesc' => 'ပင်မယူနစ် မလောက်ငှပါ။ပင်မယူနစ်ဖြည့်သွင်းပါရန်။');
        }
          $wallet_upt_qry = "update user_wallets set wallet= wallet + " . $amount . " , " . $providerCode . "_wallet = " . $providerCode . "_wallet - " . ($amount * config('app.wallet_config')[$providerCode]) . " , updated_at = now() where user_id = " . $userId;
        
        $updated_wallet = DB::statement($wallet_upt_qry);
        if ($updated_wallet) {
            $res_wallet = DB::table('user_wallets')
                ->where('user_id', $userId)->get();
            $updated_wallet = DB::statement("update users set balance = " . $res_wallet[0]->wallet . " where id = " . $res_wallet[0]->user_id);

            return $res_wallet;
        } else {
            return null;
        }

    }
}
