<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransferLogRequest;
use App\Mail\CashRequest;
use App\Models\Admin\Provider;
use App\Models\Admin\TransferLog;
use App\Models\CashInRequest;
use App\Models\User;
use App\Services\ApiService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;


class CashInRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $cashes = CashInRequest::with('user')->latest()->get();
        return view('admin.cash_request.cash_in_list', compact('cashes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function deposit(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
            'last_6_num' => 'required',
            'receipt' => 'required|file|image',
            'amount' => 'required|numeric',
            'phone' => 'required|numeric',
        ]);

        $image = $request->file('receipt');
        $ext = $image->getClientOriginalExtension();
        $filename = uniqid('receipt') . '.' . $ext;
        $image->move(public_path('assets/img/receipts/'), $filename);

        $cashIn = CashInRequest::create([
            'payment_method' => $request->payment_method,
            'last_6_num' => $request->last_6_num,
            'receipt' => $filename,
            'amount' => $request->amount,
            'phone' => $request->phone,
            'user_id' => auth()->id(),
        ]);
        $user = User::find(auth()->id());
        $receipt = CashInRequest::find($cashIn->id);
        $toMail = "delightdeveloper4@gmail.com";
        $mail = [
            'status' => "Deposit Request",
            'name' => $user->name,
            'balance' => $user->balance,
            'payment_method'=> $request->payment_method,
            'phone' => $request->phone,
            'amount' => $request->amount,
            'receipt' => $receipt->img_url,
            'last_6_num' => $request->last_6_num,
        ];
        // return $message;
        Mail::to($toMail)->send(new CashRequest($mail));
        return redirect()->back()->with('success', 'Deposit request submitted successfully');
    }

   
    public function getTransfer(CashInRequest $cash)
    {
        
        $providers = Provider::all();
        
        return view('admin.cash_request.transfer', compact(['cash', 'providers']));
    }
    public function makeTransfer(TransferLogRequest $request,CashInRequest $cash)
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
            $signature = $this->getSignature($inputs,$user,$this->deposit);
            
            $param = $this->getParam($inputs,$signature,$user,$this->deposit);
          
            $data = $this->apiService->get($endpoint, $param);
  
            if ($data['errCode'] == 0) {

                TransferLog::create(array_merge($inputs,['cash_in' => $inputs['amount'],'status' => $data['errMsg']]));
                $user->balance += $inputs['amount'];
                $user->save();
                
                return redirect()->back()
                ->with('success',' Money Cashout request submitted successfully!');


            }else{

                return redirect()->back()->with('error',$data['errMsg']);
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
        CashInRequest::find($id)->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status Changed Successfully');
    }

    public function show($id){
        $cash = CashInRequest::find($id);
        // return $cash;
        return view('admin.cash_request.cash_in_show', compact('cash'));
    }

}
