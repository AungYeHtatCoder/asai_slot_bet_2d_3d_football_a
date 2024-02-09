<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransferLogRequest;
use App\Mail\CashRequest;
use App\Models\Admin\Provider;
use App\Models\Admin\TransferLog;
use App\Models\CashOutRequest;
use App\Models\User;
use App\Services\ApiService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;

class CashOutRequestController extends Controller
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


    public function index()
    {
        $cashes = CashOutRequest::with('user')->latest()->get();
        return view('admin.cash_request.cash_out_list', compact('cashes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function withdraw(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
            'amount' => 'required|numeric',
            'phone' => 'required|numeric',
        ]);
        if($request->amount > auth()->user()->balance){
            return redirect()->back()->with('error', 'Insufficient balance');
        }
        CashOutRequest::create([
            'payment_method' => $request->payment_method,
            'amount' => $request->amount,
            'phone' => $request->phone,
            'user_id' => auth()->id(),
        ]);
        $user = User::find(auth()->id());
        $toMail = "delightdeveloper4@gmail.com";
        $mail = [
            'status' => "Withdraw Request",
            'name' => $user->name,
            'balance' => $user->balance,
            'payment_method'=> $request->payment_method,
            'phone' => $request->phone,
            'amount' => $request->amount,
        ];
        // return $message;
        Mail::to($toMail)->send(new CashRequest($mail));
        return redirect()->back()->with('success', 'Withdraw request submitted successfully');
    }

    public function getCashOut(CashOutRequest  $cash)
    {
        $admin = Auth()->user();
        $transfer_logs = TransferLog::where('to_user_id', $cash->user_id)->get();
        // $adminBalance = $this->getAdminBalance();
        $providers  = Provider::all();
        return view('admin.cash_request.cash_out', compact('cash', 'admin', 'transfer_logs','providers'));
    }

    public function makeCashOut(TransferLogRequest $request)
    {
        
        abort_if(
            Gate::denies('make_transfer'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
      
        try {
           
            $refrence_id = $this->getRefrenceId();
            $inputs =array_merge($request->validated(),['refrence_id' => $refrence_id]);
            $user = User::findOrFail($inputs['to_user_id']);
            $endpoint = '/makeTransfer.aspx';
        
            // Create transfer log
            $signature = $this->getSignature($inputs,$user,$this->withdraw);
            
            $param = $this->getParam($inputs,$signature,$user,$this->withdraw);
          
            $data = $this->apiService->get($endpoint, $param);
           
            TransferLog::create(array_merge($inputs,['cash_out' => $inputs['amount'],'status' => $data['errMsg']]));

            if ($data['errCode'] == 0) {
                $user->balance -= $inputs['amount'];
                $user->save();
                
                return redirect()->back()->with('success', 'Money Cashout request submitted successfully!');
            }else{

                return redirect()->back()->with('error', $data['errMsg']);

            }

          
        } catch (Exception $e) {

            return redirect()->back()->with('error',$e->getMessage());

        }
    }

    private function getRefrenceId($prefix = 'REF')
    {
        return  uniqid($prefix);
    }
    private function getSignature($inputs,$user,$type)
    {
        $signatureString = $inputs['amount'].'.00' . $this->operatorCode . $this->backendPassword .
                $inputs['p_code'] . $inputs['refrence_id'] . $type . $user->name . $this->secretKey;

       
        return ApiHelper::generateSignature($signatureString);
    }

    private function getParam($inputs,$signature,$user,$type)
    {
        return  [
            'operatorcode' => $this->operatorCode,
            'providercode' => $inputs['p_code'],
            'username' => $user->name,
            'password' => $this->backendPassword,
            'signature' => $signature,
            'referenceid' => $inputs['refrence_id'],
            'type' => $type,
            'amount' => $inputs['amount'].'.00',
        ];
    }
    public function statusChange(Request $request, $id){
        $request->validate([
            'status' => 'required|in:0,1,2,3',
        ]);
        CashOutRequest::find($id)->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status Changed Successfully');
    }
    public function show($id){
        $cash = CashOutRequest::find($id);
        return view('admin.cash_request.cash_out_show', compact('cash'));
    }
}
