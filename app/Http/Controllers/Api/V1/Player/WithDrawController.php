<?php

namespace App\Http\Controllers\Api\V1\Player;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\WithdrawRequest;
use App\Models\WithDrawRequest as ModelsWithDrawRequest;
use App\Services\ApiService;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithDrawController extends Controller
{

    use HttpResponses;

    public function withdraw(WithdrawRequest $request)
    {
        try {
            $inputs = $request->validated();
            $player = Auth::user();
           
            if($player->balance < $inputs['amount'])
            {
                return $this->error('', 'Insuffience Balance', 401);
            }
            $withdraw = ModelsWithDrawRequest::create(array_merge($inputs,['user_id' => $player->id]));
            return $this->success($withdraw,'Withdraw Request Success');
        }catch(Exception $e) {
            $this->error('',$e->getMessage(),401);
        }
    }

}
