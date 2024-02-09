<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use App\Models\Admin\Promotion;
use App\Models\User;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;

class BannerController extends Controller
{
    use HttpResponses;
   public function index()
   {
        $data = Banner::all();
        return $this->success($data);
        
   }
}
