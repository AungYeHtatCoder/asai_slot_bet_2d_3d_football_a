<?php

namespace App\Http\Controllers\Admin\TransferLog;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\TransferLog;

class TransferLogController extends Controller
{
    public function index()
    {
        // authorize 
        $this->authorize('transfer_log', User::class);
        $transferLogs = TransferLog::where('from_user_id',Auth::id())->orWhere('to_user_id',Auth::id())->get();
        
        return view('admin.trans_log.index', compact('transferLogs'));
    }


    public function AdminToMasterDailyStatusTransferLog()
{
    // authorize 
    $this->authorize('viewAdminTransferLog', User::class);
    // Get all TransferLog records
    $id = auth()->id(); // ID of the Admin
    $transfer_user = User::findOrFail($id);

    $today = date('Y-m-d');

    $totalCashIn = TransferLog::where('from_user_id', $id)
        ->whereDate('created_at', $today)
        ->sum('cash_in');

    $totalCashOut = TransferLog::where('from_user_id', $id)
        ->whereDate('created_at', $today)
        ->sum('cash_out');

    $transferLogs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->whereDate('created_at', $today)
        ->get();

    return view('admin.trans_log.daily_admin_transfer_log', compact('transferLogs', 'totalCashIn', 'totalCashOut'));
}

public function AdminToMasterMonthlyStatusTransferLog()
{
    // authorize 
    $this->authorize('viewAdminTransferLog', User::class);
    // Get all TransferLog records
    $id = auth()->id(); // ID of the Admin
    $transfer_user = User::findOrFail($id);

    $currentMonth = date('m');

    $totalCashIn = TransferLog::where('from_user_id', $id)
        ->whereMonth('created_at', $currentMonth)
        ->sum('cash_in');

    $totalCashOut = TransferLog::where('from_user_id', $id)
        ->whereMonth('created_at', $currentMonth)
        ->sum('cash_out');

    $transferLogs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->whereMonth('created_at', $currentMonth)
        ->get();

    return view('admin.trans_log.monthly_admin_transfer_log', compact('transferLogs', 'totalCashIn', 'totalCashOut'));
}


 public function MasterToAgentDailyStatusTransferLog()
{
    // authorize 
    $this->authorize('viewMasterTransferLog', User::class);
    // Get all TransferLog records
    $id = auth()->id(); // ID of the Admin
    $transfer_user = User::findOrFail($id);

    $today = date('Y-m-d');

    $totalCashIn = TransferLog::where('from_user_id', $id)
        ->whereDate('created_at', $today)
        ->sum('cash_in');

    $totalCashOut = TransferLog::where('from_user_id', $id)
        ->whereDate('created_at', $today)
        ->sum('cash_out');

    $transferLogs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->whereDate('created_at', $today)
        ->get();

    return view('admin.trans_log.daily_master_transfer_log', compact('transferLogs', 'totalCashIn', 'totalCashOut'));
}

public function MasterToAgentMonthlyStatusTransferLog()
{
    // authorize 
    $this->authorize('viewMasterTransferLog', User::class);
    // Get all TransferLog records
    $id = auth()->id(); // ID of the Admin
    $transfer_user = User::findOrFail($id);

    $currentMonth = date('m');

    $totalCashIn = TransferLog::where('from_user_id', $id)
        ->whereMonth('created_at', $currentMonth)
        ->sum('cash_in');

    $totalCashOut = TransferLog::where('from_user_id', $id)
        ->whereMonth('created_at', $currentMonth)
        ->sum('cash_out');

    $transferLogs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->whereMonth('created_at', $currentMonth)
        ->get();

    return view('admin.trans_log.monthly_master_transfer_log', compact('transferLogs', 'totalCashIn', 'totalCashOut'));
}

public function AgentToUserDailyStatusTransferLog()
{
    // authorize 
    $this->authorize('viewAgentTransferLog', User::class);
    // Get all TransferLog records
    $id = auth()->id(); // ID of the Admin
    $transfer_user = User::findOrFail($id);

    $today = date('Y-m-d');

    $totalCashIn = TransferLog::where('from_user_id', $id)
        ->whereDate('created_at', $today)
        ->sum('cash_in');

    $totalCashOut = TransferLog::where('from_user_id', $id)
        ->whereDate('created_at', $today)
        ->sum('cash_out');

    $transferLogs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->whereDate('created_at', $today)
        ->get();

    return view('admin.trans_log.daily_agent_transfer_log', compact('transferLogs', 'totalCashIn', 'totalCashOut'));
}

public function AgentToUserMonthlyStatusTransferLog()
{
    // authorize 
    $this->authorize('viewAgentTransferLog', User::class);
    // Get all TransferLog records
    $id = auth()->id(); // ID of the Admin
    $transfer_user = User::findOrFail($id);

    $currentMonth = date('m');

    $totalCashIn = TransferLog::where('from_user_id', $id)
        ->whereMonth('created_at', $currentMonth)
        ->sum('cash_in');

    $totalCashOut = TransferLog::where('from_user_id', $id)
        ->whereMonth('created_at', $currentMonth)
        ->sum('cash_out');

    $transferLogs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->whereMonth('created_at', $currentMonth)
        ->get();

    return view('admin.trans_log.monthly_agent_transfer_log', compact('transferLogs', 'totalCashIn', 'totalCashOut'));
}

    public function MasterToAgentTransferLog()
    {
        // authorize 
        $this->authorize('viewMasterTransferLog', User::class);
        // Get all TransferLog records
        $id = auth()->id(); // ID of the Admin
        $transfer_user = User::findOrFail($id);

        $transferLogs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->get();

         // Calculate the difference between cash_in and cash_out and update cash_balance
    foreach ($transferLogs as $log) {
        $log->cash_balance = $log->cash_in - $log->cash_out;
        $log->save();
    }

        return view('admin.trans_log.master_transfer_log', compact('transferLogs'));
        //return response()->json($transferLogs);
    }
    public function AgentToUserTransferLog()
    {
        // authorize 
        $this->authorize('viewAgentTransferLog', User::class);
        // Get all TransferLog records
        $id = auth()->id(); // ID of the Admin
        $transfer_user = User::findOrFail($id);

        $transferLogs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->get();

        return view('admin.trans_log.agent_transfer_log', compact('transferLogs'));
        //return response()->json($transferLogs);
    }
}