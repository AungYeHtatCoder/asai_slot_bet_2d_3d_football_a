<?php

namespace App\Http\Controllers\Admin\Agent;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequest;
use App\Http\Requests\TransferLogRequest;
use App\Models\Admin\TransferLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private const AGENT_ROLE = 2;

    public function index()
    {
        abort_if(
            Gate::denies('agent_index'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        //kzt
        $users = DB::table('users')
        ->join('role_user', 'role_user.user_id', '=', 'users.id')
        ->where(function ($role) {
            $role->where('role_user.role_id','=',2);
        })
        ->where('users.agent_id',  auth()->id())->latest()->get();
        //kzt
        return view('admin.agent.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(
            Gate::denies('agent_create'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );

        return view('admin.agent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentRequest $request)
    {
        abort_if(
            Gate::denies('agent_store'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );


        $inputs = $request->validated();
        $userPrepare  = array_merge(
            $inputs,
            [
                'password' => Hash::make($inputs['password']),
                'agent_id' => Auth()->user()->id
            ]
        );
        $user = User::create($userPrepare);
        $user->roles()->sync(self::AGENT_ROLE);
        return redirect(route('admin.agent.index'))->with('success', 'Agent has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort_if(
            Gate::denies('agent_show'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );

        $user_detail = User::find($id);
        return view('admin.agent.show', compact('user_detail'));
    }
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort_if(
            Gate::denies('agent_edit'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );

        $user = User::find($id);
        return view('admin.agent.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort_if(
            Gate::denies('agent_update'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );

        $request->validate([
            'name' => 'required|min:3|unique:users,name,' . $id,
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'unique:users,phone,' . $id],
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        
        return redirect(route('admin.agent.index'))->with('success', 'Agent has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
   
    public function getCashIn(string $id)
    {
        abort_if(
            Gate::denies('agent_transfer'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );

        $agent = User::find($id);
        return view('admin.agent.cash_in', compact('agent'));
    }
    public function getCashOut(string $id)
    {
        abort_if(
            Gate::denies('agent_transfer'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );

        // Assuming $id is the user ID
        $agent = User::findOrFail($id);
      
        
        return view('admin.agent.cash_out', compact('agent'));
    }

    public function makeCashIn(TransferLogRequest $request,$id)
    {
        
        abort_if(
            Gate::denies('agent_transfer'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );

        try {
                $inputs = $request->validated();
                $agent = User::findOrFail($id);
                $admin = Auth::user();
                $cashIn = $inputs['amount'];

                if ($cashIn > $admin->balance) {
                    throw new \Exception('You do not have enough balance to transfer!');
                }

                // Transfer money
                $agent->balance += $cashIn;
                $agent->save();
                $admin->balance -= $cashIn;
                $admin->save();

                $inputs['cash_balance'] = $agent->balance;
                $inputs['cash_in'] = $cashIn;
                $inputs['to_user_id'] = $id;
                $inputs['type'] = 0 ; //deposit
                // Create transfer log
                TransferLog::create(array_merge($inputs));
         
            return redirect()->back()->with('success', 'Money fill request submitted successfully!');
        } catch (Exception $e) {
            
            session()->flash('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function makeCashOut(TransferLogRequest $request, string $id)
    {
              
        abort_if(
            Gate::denies('agent_transfer'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        
        try {
            $inputs = $request->validated();
          
            $agent = User::findOrFail($id);
            $admin = Auth::user();
            $cashOut = $inputs['amount'];

            if ($cashOut > $agent->balance) {

                return redirect()->back()->with('error', 'You do not have enough balance to transfer!');
            }

            // Transfer money
            $agent->balance -= $cashOut;
            $agent->save();

            $inputs['cash_balance'] = $agent->balance;
            $inputs['cash_out'] = $cashOut;
            $inputs['to_user_id'] = $admin->id;
            $inputs['type'] = 1 ; //withdraw

         TransferLog::create($inputs);
         
            return redirect()->back()->with('success', 'Money fill request submitted successfully!');
        } catch (Exception $e) {

            session()->flash('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Money fill request submitted successfully!');
    }

    public function getTransferDetail($id)
    {
          
        abort_if(
            Gate::denies('agent_transfer'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        $transfer_detail = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
                ->get();

        return view('admin.agent.transfer_detail', compact('transfer_detail'));
            

    }

    public function banAgent($id)
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

}
