<?php

namespace App\Http\Controllers\Admin\Player;

use Exception;
use App\Models\User;
use App\Helpers\ApiHelper;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Models\Admin\TransferLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\TransferLogRequest;
use App\Http\Requests\UserRequest;
use App\Models\Admin\PlayerTransactionLogs;
use Illuminate\Support\Env;
use Symfony\Component\HttpFoundation\Response;


class PlayerController extends Controller
{

    protected $apiService;
    protected $operatorCode;
    protected $secretKey;
    protected $backendPassword;
    protected $deposit;
    protected $withdraw;



    public function __construct(ApiService $apiService)
    {

        $this->apiService = $apiService;
        $this->operatorCode = config('common.operatorcode');
        $this->secretKey  = config('common.secret_key');
        $this->backendPassword  = config('common.backend_password');
        $this->deposit  = config('common.deposit');
        $this->withdraw = config('common.withdraw');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(
            Gate::denies('player_index'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );


        //kzt
        $users = DB::table('users')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->where(function ($role) {
                $role->where('role_user.role_id', '=', 3);
            })
            ->where('users.agent_id',  auth()->id())->latest()->get();
        //kzt
        return view('admin.player.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(
            Gate::denies('player_create'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        $player_name = $this->generateRandomString();
        return view('admin.player.create',compact('player_name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        dd($request->all());
        abort_if(
            Gate::denies('player_store'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot Access this page because you do not have permission'
        );

        try {
            // Validate input
            $inputs = $request->validated();
            $userPrepare = array_merge(
                $inputs,
                [
                    'password' => Hash::make($inputs['password']),
                    'agent_id' => Auth()->user()->id
                ]
            );


            // Create user in local database
            $user = User::create($userPrepare);
            $user->roles()->sync('3');

            // Wallet operations
            DB::table('user_wallets')->insert([
                'user_id' => $user->id,
                // wallet fields and initial values go here
                'user_id' => $user->id,
                'wallet' => 0.00,
                'ag_wallet' => 0.00,
                'gb_wallet' => 0.00,
                'g8_wallet' => 0.00,
                'jk_wallet' => 0.00,
                'jd_wallet' => 0.00,
                'l4_wallet' => 0.00,
                'k9_wallet' => 0.00,
                'pg_wallet' => 0.00,
                'pr_wallet' => 0.00,
                're_wallet' => 0.00,
                's3_wallet' => 0.00
            ]);

            return redirect()->back()
                ->with('success', 'Player created successfully')
                ->with('url', env('APP_URL'))
                ->with('password', $request->password)
                ->with('username', $user->name);
                
        } catch (Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort_if(
            Gate::denies('player_show'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );

        $user_detail = User::findOrFail($id);

        return view('admin.player.show', compact('user_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $player)
    {
        abort_if(
            Gate::denies('player_edit'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );

        return response()->view('admin.player.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $player)
    {

        $player->update($request->all());
        return redirect()->route('admin.player.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $player)
    {
        abort_if(
            Gate::denies('user_delete'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        //$player->destroy();
        User::destroy($player->id);

        return redirect()->route('admin.player.index')->with('success', 'User deleted successfully');
    }


    public function massDestroy(Request $request)
    {
        User::whereIn('id', request('ids'))->delete();
        return response(null, 204);
    }

    public function banUser($id)
    {
        $user = User::find($id);
        $user->update(['status' => $user->status == 1 ? 2 : 1]);
        if (Auth::check() && Auth::id() == $id) {
            Auth::logout();
        }
        return redirect()->back()->with(
            'success',
            'User ' . ($user->status == 1 ? 'activated' : 'banned') . ' successfully'
        );
    }

    public function getCashIn(User $player)
    {
        abort_if(
            Gate::denies('make_transfer'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        return view('admin.player.cash_in', compact('player'));
    }
    public function makeCashIn(TransferLogRequest $request, User $player)
    {
        abort_if(
            Gate::denies('make_transfer'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );

        try {
            $inputs = $request->validated();
            $inputs['refrence_id'] = $this->getRefrenceId();

            $agent = Auth::user();
            $cashIn = $inputs['amount'];

            if ($cashIn > $agent->balance) {

                return redirect()->back()->with('error', 'You do not have enough balance to transfer!');
            }

            $agent->balance -= $cashIn;
            /** @var \App\Models\User $agent **/
            $agent->save();
            $player->balance += $cashIn;
            $player->save();
            $userWallet = $player->userWallet;
            $userWallet->wallet += $cashIn;
            $userWallet->save();

            $inputs['cash_balance'] = $player->balance;
            $inputs['cash_in'] = $cashIn;
            $inputs['to_user_id'] = $player->id;
            $inputs['type'] = 0;
            // Create transfer log
            TransferLog::create($inputs);
            return redirect()->back()
                ->with('success', ' Money CashIn submitted successfully!');
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function getCashOut(User $player)
    {
        abort_if(
            Gate::denies('make_transfer'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        return view('admin.player.cash_out', compact('player'));
    }
    public function makeCashOut(TransferLogRequest $request, User $player)
    {
        abort_if(
            Gate::denies('make_transfer'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );

        try {
            $inputs = $request->validated();
            $inputs['refrence_id'] = $this->getRefrenceId();

            $agent = Auth::user();
            $cashOut = $inputs['amount'];

            if ($cashOut > $player->balance) {

                return redirect()->back()->with('error', 'You do not have enough balance to transfer!');
            }


            // Transfer money

            $agent->balance += $cashOut;
            /** @var \App\Models\User $agent **/

            $agent->save();
            $player->balance -= $cashOut;
            $player->save();

            $inputs['cash_balance'] = $player->balance;
            $inputs['cash_out'] = $cashOut;
            $inputs['to_user_id'] = $agent->id;
            // Create transfer log
            PlayerTransactionLogs::create($inputs);
            return redirect()->back()
                ->with('success', ' Money CashOut submitted successfully!');
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function getTransferDetail($id)
    {
        $transfer_detail = TransferLog::where('from_user_id', $id)
            ->orWhere('to_user_id', $id)
            ->get();
        return view('admin.player.transfer_detail', compact('transfer_detail'));
    }
    private function generateRandomString()
    {
        $randomNumber = mt_rand(10000000, 99999999);
        return 'MW' . $randomNumber;
    }
    private function getRefrenceId($prefix = 'REF')
    {
        return  uniqid($prefix);
    }
}