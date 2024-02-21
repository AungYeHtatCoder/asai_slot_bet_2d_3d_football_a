<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameDetailResource;
use App\Http\Resources\GameListResource;
use App\Http\Resources\GameLogResource;
use App\Models\Admin\GameList;
use App\Models\Admin\GameType;
use App\Models\Admin\Provider;
use App\Models\BettingHistory;
use App\Services\ApiService;
use App\Traits\HttpResponses;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{
    use HttpResponses;
    protected $apiService;
    protected $operatorCode;

    protected $secretKey;
    protected $backendDefault;



    public function __construct(ApiService $apiService)
    {

        $this->apiService = $apiService;
        $this->operatorCode = config('common.operatorcode');
        $this->secretKey  = config('common.secret_key');
        $this->backendDefault = config('common.backend_password');
    }

    public function gameList()
    {

        $gameTypes = GameType::with(['providers' => function ($query) {
            $query->orderBy('order', 'desc');
        }])->get();
        return $this->success(
            GameListResource::collection($gameTypes),
            'Game List Successfully'
        );
    }

    public function gameLog(Request $request)
    {
        $player = Auth::user();
        $query = DB::table('betting_histories')
            ->select(
                'game_types.description as game_type',
                'providers.description',
                'game_lists.name_en',
                'users.name as player_name',
                DB::raw('SUM(betting_histories.bet) as total_bet'),
                DB::raw('SUM(betting_histories.payout) - SUM(betting_histories.turnover) as winlose'),
                'betting_histories.end_time as play_time'
            )
            ->join('users', DB::raw('LOWER(betting_histories.player_name)'), '=', DB::raw('LOWER(users.name)'))
            ->leftJoin('game_lists', 'betting_histories.game_id', '=', 'game_lists.game_id')
            ->leftJoin('providers', 'betting_histories.p_code', '=', 'providers.p_code')
            ->leftJoin('game_types', 'betting_histories.game_type', '=', 'game_types.code')
            ->where('betting_histories.is_mark', 1)
            ->where('users.id', $player->id)
            ->whereBetween('betting_histories.created_at', [$request->fromDate, $request->toDate])
            ->groupBy('providers.description', 'game_lists.name_en', 'game_types.description','users.name','betting_histories.end_time')
            ->orderBy('betting_histories.end_time')
            ->get();
        return $this->success(GameLogResource::collection($query), 'Game Log Listing');
    }
    public function hotGame()
    {
        $data = GameList::orderBy('click_count', 'desc')->limit(16)->get();

        return $this->success($data, 'HotGame listing');
    }

    public function getGameDetail($provider_id, $game_type_id)
    {
        $gameLists = GameList::where('provider_id', $provider_id)
            ->where('game_type_id', $game_type_id)->get();

        return $this->success(GameDetailResource::collection($gameLists), 'Game Detail Successfully');
    }
    public function launchGame($id)
    {
        $game = GameList::where('id', $id)->first();

        $endpoint = '/launchGames.aspx';
        $password = $this->backendDefault;
        $providerCode = $game->provider->p_code;
        $userName = Auth::user()->name;
        $type = $game->gameType->code;
        $gameId = $game->game_id;

        $signature = $this->getSignature(
            $this->operatorCode,
            $password,
            $providerCode,
            $type,
            $userName,
            $this->secretKey
        );
        $game->click_count += 1;
        $game->save();

        $response = $this->apiService->get(
            $endpoint,
            $this->getParam($password, $userName, $signature, $providerCode, $type, $gameId)
        );

        if ($response['errCode'] == 0) {
            return $this->success($response['gameUrl'], 'Get launch game');
        } else {
            return $this->error('', $response['errMsg'], 500);
        }
    }

    public function providers()
    {
        $providers = Provider::all();
        return $this->success($providers, 'Get providers');
    }

    public function directGame(Provider $provider_id, GameType $game_type_id)
    {

        $endpoint = '/launchGames.aspx';
        $password = $this->backendDefault;
        $userName = Auth::user()->name;
        $providerCode = $provider_id->p_code;
        $type  = $game_type_id->code;

        $signature = $this->getSignature(
            $this->operatorCode,
            $password,
            $providerCode,
            $type,
            $userName,
            $this->secretKey
        );

        $response = $this->apiService->get(
            $endpoint,
            $this->getParam($password, $userName, $signature, $providerCode, $type)
        );
        if ($response['errCode'] == 0) {
            return $this->succes($response['gameUrl'], 'Get launch game');
        } else {

            return $this->error('', $response['errMsg'], 500);
        }
    }
    private function getSignature($operatorCode, $password, $providerCode, $type, $userName, $secretKey)
    {
        $signatureString = $operatorCode . $password . $providerCode . $type . $userName . $secretKey;

        return ApiHelper::generateSignature($signatureString);
    }

    private function getParam($password, $userName, $signature, $providerCode, $type, $isGameId = 0)
    {

        return  [
            'operatorcode' => config('common.operatorcode'),
            'providercode' => $providerCode,
            'username' => $userName,
            'password' => $password,
            'type' => $type,
            'gameid' => $isGameId,
            'lang' => 'en',
            'html5' => 0,
            'signature' => $signature,
            'blimit' => 0,
        ];
    }
}
