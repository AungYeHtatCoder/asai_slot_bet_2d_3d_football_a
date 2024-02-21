<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Models\Admin\Admin;
use App\Models\Admin\AdminAddBalance;
use App\Models\Admin\TransferLog;
use App\Models\User;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $apiService;

    protected $operatorCode;

    protected $secretKey;

    protected $apiDashbaord;

    private const DEPOSIT = 0;

    private const WITHDRAW = 1;

    public function __construct(ApiService $apiService)
    {
        $this->middleware('auth');
        $this->apiService = $apiService;
        $this->operatorCode = config('common.operatorcode');
        $this->secretKey  = config('common.secret_key');
        $this->apiDashbaord = config('common.api_dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('Owner')) {
            $signature = $this->operatorCode . $this->secretKey;

            $signatureString = ApiHelper::generateSignature($signature);
            $param = ['operatorcode' => $this->operatorCode, 'signature' => $signatureString];
            $balance = $this->apiService->get('/checkAgentCredit.aspx', $param);
            $startLastMonth = now()->subMonth()->startOfMonth();
            $endLastMonth = now()->subMonth()->endOfMonth();
         
            $userCount = User::where('agent_id', null)->count();
            $lastUserCount = User::where('agent_id', null)->whereBetween('created_at', [$startLastMonth, $endLastMonth])
                ->count();
   
            $percentageUserCount = 0;
                if ($lastUserCount != 0) {
                    $percentageUserCount = (($userCount - $lastUserCount) / $lastUserCount) * 100;
                }
            $dailyDeposit = TransferLog::select(
                DB::raw('SUM(cash_in) as cash_in'),
            )->whereDate('created_at', today())->where('type', self::DEPOSIT)->first();

            $dailyWithdraw = TransferLog::select(
                DB::raw('SUM(cash_out) as cash_out'),
            )->whereDate('created_at', today())->where('type', self::WITHDRAW)->first();

            $lastDeposit = TransferLog::select(
                DB::raw('SUM(cash_in) as cash_in'),
            )->whereBetween('created_at', [now()->subDays(9), now()])->where('type', self::DEPOSIT)->first();

            $lastWithdraw = TransferLog::select(
                DB::raw('SUM(cash_out) as cash_out'),
            )->whereBetween('created_at', [now()->subDays(9), now()])->where('type', self::WITHDRAW)->first();
            $yesterdayDeposit = TransferLog::select(
                DB::raw('SUM(cash_in) as cash_in'),
            )->whereDate('created_at', now()->yesterday())->where('type', self::DEPOSIT)->first();
           
            $yesterdayWithdraw = TransferLog::select(
                DB::raw('SUM(cash_out) as cash_out'),
            )->whereDate('created_at', now()->yesterday())->where('type', self::WITHDRAW)->first();

   

            $percentageDeposit = 0;
            if ($yesterdayDeposit->cash_in != null) {
                $percentageDeposit = (($dailyDeposit->cash_in - $yesterdayDeposit->cash_in) / $yesterdayDeposit->cash_in) * 100;
            }
            $percentageWithdraw = 0;
            if ($yesterdayWithdraw->cash_out != null) {
                $percentageWithdraw = (($dailyWithdraw->cash_out - $yesterdayWithdraw->cash_out) / $yesterdayWithdraw->cash_out) * 100;
            }

            $report = DB::table('betting_histories')
                ->select(
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('SUM(betting_histories.bet) as total_bet'),
                    DB::raw('SUM(betting_histories.payout) as total_payout'),
                    DB::raw('SUM(betting_histories.turnover) as total_turnover')
                )
                ->groupBy(DB::raw('Date(created_at)'))->get();

            return view('admin.dashboard', compact(
                'userCount',
                'percentageUserCount',
                'balance',
                'user',
                'balance',
                'dailyDeposit',
                'dailyWithdraw',
                'lastDeposit',
                'lastWithdraw',
                'percentageDeposit',
                'percentageWithdraw',
                'report'
            ));
        } elseif ($user->hasRole('Agent')) {

            $startLastMonth = now()->subMonth()->startOfMonth();
            $endLastMonth = now()->subMonth()->endOfMonth();
         

            $userCount = User::where('agent_id', $user->id)->count();

            $lastUserCount = User::where('agent_id', null)->whereBetween('created_at', [$startLastMonth, $endLastMonth])
                ->count();
            $percentageUserCount = 0;
            if ($lastUserCount != 0) {
                $percentageUserCount = (($userCount - $lastUserCount) / $lastUserCount) * 100;
            } 
            $dailyDeposit = TransferLog::select(
                DB::raw('SUM(cash_in) as cash_in'),
            )->whereDate('created_at', today())->where('type', self::DEPOSIT)
                ->where('from_user_id', $user->id)->first();

            $dailyWithdraw = TransferLog::select(
                DB::raw('SUM(cash_out) as cash_out'),
            )->whereDate('created_at', today())->where('type', self::WITHDRAW)
                ->where('to_user_id', $user->id)->first();

            $lastDeposit = TransferLog::select(
                DB::raw('SUM(cash_in) as cash_in'),
            )->whereBetween('created_at', [now()->subDays(9), now()])->where('type', self::DEPOSIT)
                ->where('to_user_id', $user->id)->first();

            $lastWithdraw = TransferLog::select(
                DB::raw('SUM(cash_out) as cash_out'),
            )->whereBetween('created_at', [now()->subDays(9), now()])->where('type', self::WITHDRAW)
                ->where('to_user_id', $user->id)->first();

            $yesterdayDeposit = TransferLog::select(
                DB::raw('SUM(cash_in) as cash_in'),
            )->whereDate('created_at', now()->yesterday())
                ->where('to_user_id', $user->id)->where('type', self::DEPOSIT)->first();

            $yesterdayWithdraw = TransferLog::select(
                DB::raw('SUM(cash_out) as cash_out'),
            )->whereDate('created_at', now()->yesterday())->where('to_user_id', $user->id)
                ->where('type', self::WITHDRAW)->first();

            $percentageDeposit = 0;
            if ($yesterdayDeposit->cash_in != null) {
                $percentageDeposit = (($dailyDeposit->cash_in - $yesterdayDeposit->cash_in)
                    / $yesterdayDeposit->cash_in) * 100;
            }
            $percentageWithdraw = 0;
            if ($yesterdayWithdraw->cash_out != null) {
                $percentageWithdraw = (($dailyWithdraw->cash_out - $yesterdayWithdraw->cash_out)
                    / $yesterdayWithdraw->cash_out) * 100;
            }


            $report = DB::table('betting_histories')
                ->select(
                    DB::raw('DATE(betting_histories.created_at) as date'),
                    DB::raw('SUM(betting_histories.bet) as total_bet'),
                    DB::raw('SUM(betting_histories.payout) as total_payout'),
                    DB::raw('SUM(betting_histories.turnover) as total_turnover')
                )
                ->leftJoin('users', 'betting_histories.player_name', '=', 'users.name')
                ->where('users.agent_id', Auth::id())
                ->groupBy(DB::raw('Date(created_at)'))->get();

            return view('admin.dashboard', compact(
                'userCount',
                'percentageUserCount',
                'user',
                'dailyDeposit',
                'dailyWithdraw',
                'lastDeposit',
                'lastWithdraw',
                'percentageDeposit',
                'percentageWithdraw',
                'report'
            ));
        } else {
            return redirect('/');
        }
    }

    public function apiDashboard()
    {
        return view('admin.api_dashboard')->with(['apiDashboard' => $this->apiDashbaord]);
    }

    public function balanceUp(Request $request)
    {
        abort_if(
            Gate::denies('admin_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );

        $request->validate([
            'balance' => 'required|numeric',
        ]);
        $user = Auth::user();
        $user->balance += $request->balance;
        $user->save();

        AdminAddBalance::create([
            'user_id' => Auth::id(),
            'balance_up' => $request->balance,
            'remark' => $request->remark ?? "",
        ]);

        return redirect()->back()->with('success', "Admin Balance has been Updated.");
    }
}
