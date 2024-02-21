<?php

namespace App\Http\Controllers\Admin\WithDraw;

use App\Http\Controllers\Controller;
use App\Models\Admin\PlayerTransactionLogs;
use App\Models\Admin\TransferLog;
use App\Models\User;
use App\Models\WithDrawRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WithDrawRequestController extends Controller
{
    public function index()
    {
        $withdraws = WithDrawRequest::with(['user', 'bank'])->get();
        return view('admin.withdraw_request.index', compact('withdraws'));
    }
    public function show($id)
    {
        $withdraw = WithDrawRequest::find($id);

        return view('admin.withdraw_request.show', compact('withdraw'));
    }

    public function statusChange(Request $request, WithDrawRequest $withdraw)
    {

        $request->validate([
            'status' => 'required|in:0,1,2'
        ]);

        try {
            $agent = Auth::user();
            $player = User::find($request->player);
            if ($agent->balance < $request->amount) {
                return redirect()->back()->with('error', 'You do not have enough balance to transfer!');
            }

            $withdraw->update([
                'status' => $request->status
            ]);
            $agent->balance += $request->amount;
            $agent->save();
            $player->balance -= $request->amount;
            $player->save();

            $userWallet = $player->userWallet;
            $userWallet->wallet -= $request->amount;
            $userWallet->save();

            TransferLog::create([
                'name' => $player->name,
                'phone' => $player->phone,
                'from_user_id' => $agent->id,
                'to_user_id' => $player->id,
                'refrence_id' => $this->getRefrenceId(),
                'cash_out' => $request->amount,
                'type' => 1
            ]);
            return back()->with('success', 'Admin status switch successfully!');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    private function getRefrenceId($prefix = 'TRF')
    {
        return  uniqid($prefix);
    }
}
