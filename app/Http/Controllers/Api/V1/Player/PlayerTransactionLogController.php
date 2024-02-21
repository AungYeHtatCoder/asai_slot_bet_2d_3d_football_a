<?php

namespace App\Http\Controllers\Api\V1\Player;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlayerTransactionLogResource;
use App\Models\Admin\PlayerTransactionLogs;
use App\Models\Admin\TransferLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;

class PlayerTransactionLogController extends Controller
{
    use HttpResponses;

    public function index(Request $request)
    {
     
        $transaction_log = TransferLog::whereBetween('created_at', [$request->fromDate, $request->toDate])
            ->when(isset($request->type), function ($query) use ($request) {
                if ($request->type == 'deposit') {
                    $query->where('type', 0);
                } elseif ($request->type == 'withdraw') {
                    $query->where('type', 1);
                }
            })
            ->where('to_user_id', Auth::id())->get();
        return $this->success(
            PlayerTransactionLogResource::collection($transaction_log)->additional(['type' => $request->type]),
            'Transactionlogs List Successfully'
        );
    }
}
