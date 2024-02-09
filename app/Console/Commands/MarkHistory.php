<?php

namespace App\Console\Commands;

use App\Helpers\ApiHelper;
use App\Models\BettingHistory as ModelsBettingHistory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class MarkHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:mark-history';

    protected $operatorCode;
    protected $secretKey;
    public const VERSION_KEY = 1;
    public const IS_MARK = 1;

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
        $baseUrl = 'http://gslog.336699bet.com/markbyjson.aspx';
        
        $signatureString = $this->operatorCode . $this->secretKey;
        $signature = ApiHelper::generateSignature($signatureString);
       
        $bettingIds = ModelsBettingHistory::where('is_mark',0)->pluck('betting_id');
        $stringValues = implode(',', $bettingIds->toArray());
        
            $param = [
                'operatorcode' => $this->operatorCode,
                'ticket' => $stringValues,
                'signature' => $signature
            ];
            Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($baseUrl, $param);
            $result = explode(",", $stringValues);

            ModelsBettingHistory::whereIn('betting_id',$result)->update(['is_mark' => self::IS_MARK]);

        $this->line('<fg=green>Mark History Created Successfully</>');
        
    }
}
