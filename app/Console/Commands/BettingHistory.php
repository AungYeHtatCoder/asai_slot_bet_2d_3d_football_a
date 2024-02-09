<?php

namespace App\Console\Commands;

use App\Helpers\ApiHelper;
use App\Models\BettingHistory as ModelsBettingHistory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class BettingHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:betting-history';

    protected $operatorCode;
    protected $secretKey;
    public const VERSION_KEY = 1;

    public function __construct()
    {
        parent::__construct();
        $this->operatorCode =   config('common.operatorcode');
        $this->secretKey =  config('common.secret_key');
    }
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';




    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseUrl = 'http://gslog.336699bet.com/fetchbykey.aspx?';
        $signatureString = $this->operatorCode . $this->secretKey;
        $signature = ApiHelper::generateSignature($signatureString);
        $param = [
            'operatorcode' => $this->operatorCode,
            'versionkey' => self::VERSION_KEY,
            'signature' => $signature
        ];
        $response = Http::get($baseUrl, $param);
        if ($response['errCode'] == 0) {
            $result = json_decode($response['result'], true);
          
            foreach ($result as $value) {
               
               $betting = ModelsBettingHistory::where('betting_id',$value['id'])->first();
               if($betting)
               {
                $betting->update([
                    'betting_id' => $value['id'],
                    'ref_no' =>  $value['ref_no'],
                    'p_code' => $value['site'],
                    'game_type' =>  $value['product'],
                    'player_name'  =>  $value['member'],
                    'game_id'  => $value['game_id'],
                    'start_time' => $value['start_time'],
                    'match_time' => $value['match_time'],
                    'end_time'  =>  $value['end_time'],
                    'bet_detail' => $value['bet_detail'],
                    'turnover'  => $value['turnover'],
                    'bet' => $value['bet'],
                    'payout' => $value['payout'],
                    'commission' => $value['commission'],
                    'p_share' => $value['p_share'],
                    'p_win' => $value['p_win'],
                    'status' => $value['status']
                ]);
               }else{
             
                ModelsBettingHistory::create([
                   
                    'betting_id' => $value['id'],
                    'ref_no' =>  $value['ref_no'],
                    'p_code' => $value['site'],
                    'game_type' =>  $value['product'],
                    'player_name'  =>  $value['member'],
                    'game_id'  => $value['game_id'],
                    'start_time' => $value['start_time'],
                    'match_time' => $value['match_time'],
                    'end_time'  =>  $value['end_time'],
                    'bet_detail' => $value['bet_detail'],
                    'turnover'  => $value['turnover'],
                    'bet' => $value['bet'],
                    'payout' => $value['payout'],
                    'commission' => $value['commission'],
                    'p_share' => $value['p_share'],
                    'p_win' => $value['p_win'],
                    'status' => $value['status']
                ]);
            }
            }
            $this->line('<fg=green>Betting History Created Successfully</>');

        }
    }
}
