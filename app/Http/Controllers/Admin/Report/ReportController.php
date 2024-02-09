<?php

namespace App\Http\Controllers\Admin\Report;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\GameType;
use App\Models\Admin\Provider;
use App\Models\BettingHistory;
use App\Services\ApiService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ReportController extends Controller
{



    public function index(Request $request)
    {
        $query = BettingHistory::select(
            'player_name',
            DB::raw('SUM(bet) as bet'),
            DB::raw('SUM(payout) as payout'),
            DB::raw('SUM(turnover) as turnover')
        )
            ->when(isset($request->fromDate) && isset($request->toDate), function ($query) use ($request) {
                $query->whereBetween('betting_histories.created_at', [$request->fromDate, $request->toDate]);
            })
            ->when(isset($request->player_name), function ($query) use ($request) {
                $query->where('betting_histories.player_name', $request->player_name);
            })
            ->groupBy('player_name');
        if (!Auth::user()->hasRole('Owner')) {

            $query = $query->leftJoin('users', 'betting_histories.player_name', '=', 'users.name')
                ->where('users.agent_id', Auth::id());
        }
        $bettings = $query->get();

        return view('admin.report.index', compact('bettings'));
    }

    public function providerList(Request $request)
    {
        $gameTypes = GameType::all();

        $query = DB::table('betting_histories')
            ->select(
                'betting_histories.player_name',
                'game_types.description as game_type',
                'providers.description',
                'providers.p_code',
                DB::raw('SUM(betting_histories.bet) as total_bet'),
                DB::raw('SUM(betting_histories.payout) as total_payout'),
                DB::raw('SUM(betting_histories.turnover) as total_turnover')
            )
            ->leftJoin('game_lists', 'betting_histories.game_id', '=', 'game_lists.game_id')
            ->leftJoin('providers', 'betting_histories.p_code', '=', 'providers.p_code')
            ->leftJoin('game_types', 'betting_histories.game_type', '=', 'game_types.code')
            ->where('betting_histories.player_name', $request->player_name)
            ->when(isset($request->fromDate) && isset($request->toDate), function ($query) use ($request) {
                $query->whereBetween('betting_histories.created_at', [$request->fromDate, $request->toDate]);
            })
            ->groupBy('providers.description', 'providers.p_code', 'betting_histories.player_name', 'game_types.description');

        if (!Auth::user()->hasRole('Owner')) {

            $query = $query->leftJoin('users', 'betting_histories.player_name', '=', 'users.name')
                ->where('users.agent_id', Auth::id());
        }

        $results = $query->get();

        return view('admin.report.provider_list', compact('results', 'gameTypes'));
    }
    
    public function detail(Request $request)
    {
        
        $query = BettingHistory::query()
            ->where('player_name', $request['player_name'])
            ->where('p_code', $request['provider']);

        if (!Auth::user()->hasRole('Owner')) {
            $query->whereHas('user', function ($query) {
                $query->where('agent_id', Auth::id());
            })->with('user');
        }
        $results = $query->with('gameList')->get();

        $provider = Provider::where('p_code', $request['provider'])->first();
       
        $player = $request['player_name'];

        return view('admin.report.detail', compact('results', 'player', 'provider'));
    }
}
