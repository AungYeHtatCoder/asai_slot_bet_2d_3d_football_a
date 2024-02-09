<?php

namespace App\Http\Controllers\Api\V1\Bank;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BankRequest;
use App\Models\Admin\Bank;
use App\Models\UserBank;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
     use HttpResponses;

     public function all()
     {
          $data = Bank::all();
          return $this->success($data);
     }
     
}
