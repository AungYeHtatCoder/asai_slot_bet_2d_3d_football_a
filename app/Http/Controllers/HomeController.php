<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Models\Admin\Admin;
use App\Models\Admin\AdminAddBalance;
use App\Models\User;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
            
            if($user->hasRole('Owner') || $user->hasRole('Agent'))
            {
                $response = Auth::user();
                $userCount = User::where('agent_id')->count();
               
                return view('admin.dashboard',compact('response','userCount'));
            }else{
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