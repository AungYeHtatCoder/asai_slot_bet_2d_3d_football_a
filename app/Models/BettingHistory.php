<?php

namespace App\Models;

use App\Models\Admin\GameList;
use App\Models\Admin\GameType;
use App\Models\Admin\Provider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BettingHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'betting_id', 'ref_no', 'p_code', 'game_type', 'player_name', 'game_id', 'start_time', 'match_time',
        'end_time', 'bet_detail', 'turnover', 'bet', 'payout', 'commission',
        'p_share', 'p_win', 'status', 'is_mark',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'p_code', 'p_code');
    }

    public function gameType()
    {
        return $this->belongsTo(GameType::class, 'game_type', 'code');
    }

    public function gameList()
    {
        return $this->belongsTo(GameList::class, 'game_id', 'game_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'player_name', 'name');
    }

    public function scopeForOwner($query, $request)
    {

        return $query->select(
            'player_name',
            DB::raw('SUM(bet) as bet'),
            DB::raw('SUM(payout) as payout'),
            DB::raw('SUM(turnover) as turnover')
        )
            ->when(isset($request['fromDate']) && isset($request['toDate']), function ($query) use ($request) {
                $query->whereBetween('betting_histories.created_at', [$request['fromDate'], $request['toDate']]);
            })
            ->when(isset($request['player_name']), function ($query) use ($request) {
                $query->where('betting_histories.player_name', $request['player_name']);
            })
            ->groupBy('player_name');
    }

    public function scopeForAgent($query, $agentId, $request)
    {

        return $query->leftJoin('users', 'betting_histories.player_name', '=', 'users.name')
            ->select(
                'player_name',
                DB::raw('SUM(bet) as bet'),
                DB::raw('SUM(payout) as payout'),
                DB::raw('SUM(turnover) as turnover')
            )
            ->when(isset($request['fromDate']) && isset($request['toDate']), function ($query) use ($request) {
                $query->whereBetween('betting_histories.created_at', [$request['fromDate'], $request['toDate']]);
            })
            ->when(isset($request['player_name']), function ($query) use ($request) {
                $query->where('betting_histories.player_name', $request['player_name']);
            })
            ->groupBy('player_name')
            ->where('users.agent_id', $agentId);
    }
}
